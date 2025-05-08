<?php

namespace App\Http\Traits;

use App\Helpers\ParentDetailHelper;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\ParentPayment;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Stripe\Charge;
use Stripe\Stripe;

trait StripeFunctions
{
    public function CreatMembershipPaymentSession($alldata)
    {
        $totalAmount = $alldata['pay_amount'];
        $paymentToken = $alldata['parent_token'];
        $commission = $alldata['total_commission'];
        $token = Crypt::encrypt($paymentToken);
        $getParentDetails = ParentDetailHelper::getDataFromPaymentToken($paymentToken);
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session =  \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'GBP',
                    'product_data' => [
                        'name' => 'Payment of Cart',
                    ],
                    'unit_amount' => $totalAmount*100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('paymentSuccess', $token),
            'cancel_url' => route('paymentFailed', $token),
        ]);
        if($session){
            $insertArray = array(
                'user_id' => $getParentDetails->user_id,
                'user_inquiry_id' => $getParentDetails->id,
                'pay_amount' => $totalAmount,
                'total_commision' => $commission,
                'payment_type' => 'stripe',
                'payment_request_id' => $session->id,
                'payment_token' => $paymentToken,
                'created_at' => date('Y-m-d H:i:s')
            );
            $insert = new ParentPayment($insertArray);
            $insert->save();
        }
        return $session;
    }
}
