<?php

namespace App\Http\Controllers;

use App\Helpers\MailHelper;
use App\Helpers\ParentDetailHelper;
use App\Helpers\SiteSettingHelper;
use App\Helpers\TutorUniversityDetailHelper;
use App\Helpers\UserHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ParentPayment;
use App\Models\User;
use Error;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\URL;
use Stripe;
use Illuminate\Support\Facades\Session;
use App\Http\Traits\StripeFunctions;

class PaymentController extends Controller
{
    use StripeFunctions;
    public function createPaymentSession(Request $request)
    {
        $this->data['test'] = $alldata =  $request->all();
        return $sessionId = $this->CreatMembershipPaymentSession($alldata);
        return response()->json(['id' => $sessionId]);
    }
    public function stripePayment(Request $request, $id)
    {
        $data['id'] = $tokenid = Crypt::decrypt($id);
        $getParentPymenttoken = ParentDetailHelper::getPaymenttoken($tokenid);
        if ($getParentPymenttoken) {
            $totalAmount = $getParentPymenttoken->teaching_hours * $getParentPymenttoken->hourly_rate * $getParentPymenttoken->no_of_lessons;
            // add commission
            $getSitesetting = SiteSettingHelper::getSettingdata(1);
            $commission_value = $getSitesetting->commission_value;
            if ($getSitesetting->commission_value == '') {
                $commission_value = 0;
            }
            $grandTotal = (($totalAmount * $commission_value) / 100);
            $data['total'] = $totalAmount;

            $data['total_commision'] = $grandTotal;
            return view('payment.make_payment', $data);
        } else {
            Session::flash('success', 'Payment Already Success');
            return redirect()->route('parent-login');
        }
    }

    public function paypalPayment(Request $request, $id)
    {
        $data['id'] =  $paymentID = Crypt::decrypt($id);

        $getParentPymenttoken = ParentDetailHelper::getPaymenttoken($paymentID);

        if ($getParentPymenttoken) {


            $totalAmount = $getParentPymenttoken->teaching_hours * $getParentPymenttoken->hourly_rate * $getParentPymenttoken->no_of_lessons;
            // add commission
            $getSitesetting = SiteSettingHelper::getSettingdata(1);
            $commission_value = $getSitesetting->commission_value;
            if ($getSitesetting->commission_value == '') {
                $commission_value = 0;
            }
            $grandTotal = (($totalAmount * $commission_value) / 100);
            $data['paypalNew'] = $totalAmount;
            $data['total_commision'] = $grandTotal;
            $data['user_id'] = $getParentPymenttoken->user_id;
            $data['user_inquiry_id'] = $getParentPymenttoken->id;
            return view('payment.index', $data);
        } else {
            Session::flash('success', 'Payment Already Success');
            return redirect()->route('parent-login');
        }
    }
    public function ipn(Request $request)
    {
        $paymentDetail = json_encode($_POST);
        $paymentData = array(
            "ipn_log" => $paymentDetail,
        );
        $insert = new ParentPayment($paymentData);
        $insert->save();
    }
    public function payment_script_status(Request $request)
    {
        $getParentPymenttoken = ParentDetailHelper::getPaymenttoken($request->input('parent_token'));

        $payment_status = $request->input('payment_status');
        $txn_id = $request->input('txn_id');
        $payment_gross = $request->input('payment_gross');
        $item_number = $request->input('item_number');
        $item_name = $request->input('item_name');
        $paymentDetail = json_encode($_POST);

        $paymentData = array(
            "user_id" => $request->input('id'),
            "user_inquiry_id" => $item_number,
            'pay_amount' => $payment_gross,
            'total_commision' => $item_name,
            "payment_type" => 'paypal',
            "payment_status" => 'success',
            "payment_json" => $paymentDetail,
            "created_at" => date('Y-m-d H:i:s'),
        );
        $insert = new ParentPayment($paymentData);
        $insert->save();
        $insertId = $insert->id;
        $getData = ParentDetailHelper::getInquiryDetails($request->input('item_number'));
        $update = ParentDetailHelper::update(array('payment_status' => 'Success', 'payment_token' => null, 'updated_at' => date('Y-m-d H:i:s')), array('user_id' => $getData->user_id, 'tutor_id' => $getData->tutor_id, 'subject_id' => $getData->subject_id, 'level_id' => $getData->level_id, 'tuition_day' => $getData->tuition_day, 'tuition_time' => $getData->tuition_time));
        if ($update) {
            $html = '<p> A Payment for ' . $getData->subjectDetails->main_title . ' done by ' . $getData->userDetails->first_name . ' ' . $getData->userDetails->last_name . '.</p><p><b>Subject Name: </b>' . $getData->subjectDetails->main_title . '</p><p><b>Tution Time: </b>' . $getData->tuition_time . '</p><p><b>Tution Day: </b>' . $getData->tuition_day . '</p><p><b>No. of Lesson: </b>' . $getData->no_of_lessons . '</p>';
            $subject = __('emails.parent_payment');
            $BODY = __('emails.parent_payment_body', ['USERNAME' => $getData->tutorDetails->first_name, 'HTMLTABLE' => $html]);
            $body_email = __('emails.template', ['BODYCONTENT' => $BODY]);
            $mail = MailHelper::mail_send($body_email, $getData->tutorDetails->email, $subject);
            Session::flash('success', trans('messages.paymentaddedSuccessfully'));
            return redirect('/parent-login');
        } else {
            Session::flash('error', trans('messages.error'));
            return back();
        }
    }
    public function redirectPayment(Request $request)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = \Stripe\Customer::create(array(
            'name' => $request->name,
            'source' => $request->stripeToken
        ));
        $price = $request->pay_amount;
        $total_commision = $request->total_commision;
        $stripe_customer_id = $customer->id;
        $randomNo = substr(str_shuffle("0123456789"), 0, 4);
        $order_number = date('Ymdhis') . $randomNo;
        $currency = "eur";
        $itemName = "Order Payment";
        $itemNumber = $order_number;
        $itemPrice = $price * 100;
        $charge = \Stripe\Charge::create(array(
            'customer' => $stripe_customer_id,
            'amount' => $itemPrice,
            'currency' => $currency,
            'description' => $itemNumber,
            'metadata' => array(
                'item_id' => $itemNumber
            )
        ));
        $chargeJson = $charge->jsonSerialize();

        if ($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1 && $chargeJson['status'] == 'succeeded') {
            $getParentPymenttoken = ParentDetailHelper::getPaymenttoken($request->parent_token);
            if ($getParentPymenttoken) {
                $insertArray = array(
                    'user_id' => $getParentPymenttoken->user_id,
                    'user_inquiry_id' => $getParentPymenttoken->id,
                    'pay_amount' => $price,
                    'total_commision' => $total_commision,
                    'payment_type' => 'stripe',
                    'payment_status' => 'success',
                    'payment_json' => json_encode($chargeJson),
                    'created_at' => date('Y-m-d H:i:s'),
                );
                $insert = new ParentPayment($insertArray);
                $insert->save();
                $getData = ParentDetailHelper::getInquiryDetails($getParentPymenttoken->id);
                $update = ParentDetailHelper::update(array('payment_status' => 'Success', 'payment_token' => null, 'updated_at' => date('Y-m-d H:i:s')), array('user_id' => $getData->user_id, 'tutor_id' => $getData->tutor_id, 'subject_id' => $getData->subject_id, 'level_id' => $getData->level_id, 'tuition_day' => $getData->tuition_day, 'tuition_time' => $getData->tuition_time));
                if ($update) {
                    $html = '<p> A Payment for ' . $getData->subjectDetails->main_title . ' done by ' . $getData->userDetails->first_name . ' ' . $getData->userDetails->last_name . '.</p><p><b>Subject Name: </b>' . $getData->subjectDetails->main_title . '</p><p><b>Tution Time: </b>' . $getData->tuition_time . '</p><p><b>Tution Day: </b>' . $getData->tuition_day . '</p><p><b>No. of Lesson: </b>' . $getData->no_of_lessons . '</p>';
                    $subject = __('emails.parent_payment');
                    $BODY = __('emails.parent_payment_body', ['USERNAME' => $getData->tutorDetails->first_name, 'HTMLTABLE' => $html]);
                    $body_email = __('emails.template', ['BODYCONTENT' => $BODY]);
                    $mail = MailHelper::mail_send($body_email, $getData->tutorDetails->email, $subject);
                    Session::flash('success', trans('messages.paymentaddedSuccessfully'));
                    return redirect('/parent-login');
                } else {
                    Session::flash('error', trans('messages.error'));
                    return back();
                }
                Session::flash('success', trans('messages.paymentaddedSuccessfully'));
                return redirect('/parent-login');
            } else {
                Session::flash('error', trans('messages.error'));
                return back();
            }
        }
    }

    public function tutorLoginRedirect(Request $request)
    {
        $email = $request->key;
        $user = User::where('email', $email)->first();
        if ($user) {
            if (!auth()->guard('web')) {
                return redirect('tutor-account');
            } else {
                Auth::guard('super_admin')->logout();
                Auth::guard('web')->login($user);
                return redirect('tutor-account');
            }
        } else {
            return "User Not Found";
        }
    }
    public function parentLoginRedirect(Request $request)
    {
        $email = $request->key;
        $user = User::where('email', $email)->first();
        if ($user) {
            if (!auth()->guard('parent')) {
                return redirect('parent-account');
            } else {
                Auth::guard('super_admin')->logout();
                Auth::guard('parent')->login($user);
                return redirect('parent-account');
            }
        } else {
            return "User Not Found";
        }
    }
    public function paymentSuccess($paymentId)
    {
        $paymentToken = Crypt::decrypt($paymentId);
        $payment = ParentPayment::getPaymentToken($paymentToken);
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $paymentResponse = $stripe->checkout->sessions->retrieve(
            $payment->payment_request_id,
            []
        );
        $getParentPymenttoken = ParentPayment::getPaymentToken($paymentToken);
        if ($getParentPymenttoken) {
            $updateArray = array(
                'payment_status' => 'success',
                'payment_json' => json_encode($paymentResponse),
                'updated_at' => date('Y-m-d H:i:s'),
                'payment_token' => null
            );
            $updatePayment = ParentPayment::where('id',$getParentPymenttoken->id)->update($updateArray);
            $getData = ParentDetailHelper::getInquiryDetails($getParentPymenttoken->user_inquiry_id);
            $update = ParentDetailHelper::update(array('payment_status' => 'Success', 'payment_token' => null, 'updated_at' => date('Y-m-d H:i:s')), array('user_id' => $getData->user_id, 'tutor_id' => $getData->tutor_id, 'subject_id' => $getData->subject_id, 'level_id' => $getData->level_id, 'tuition_day' => $getData->tuition_day, 'tuition_time' => $getData->tuition_time));
            if ($update) {
                $html = '<p> A Payment for ' . $getData->subjectDetails->main_title . ' done by ' . $getData->userDetails->first_name . ' ' . $getData->userDetails->last_name . '.</p><p><b>Subject Name: </b>' . $getData->subjectDetails->main_title . '</p><p><b>Tution Time: </b>' . $getData->tuition_time . '</p><p><b>Tution Day: </b>' . $getData->tuition_day . '</p><p><b>No. of Lesson: </b>' . $getData->no_of_lessons . '</p>';
                $subject = __('emails.parent_payment');
                $BODY = __('emails.parent_payment_body', ['USERNAME' => $getData->tutorDetails->first_name, 'HTMLTABLE' => $html]);
                $body_email = __('emails.template', ['BODYCONTENT' => $BODY]);
                $mail = MailHelper::mail_send($body_email, $getData->tutorDetails->email, $subject);
                Session::flash('success', trans('messages.paymentaddedSuccessfully'));
                return redirect('/parent-login');
            } else {
                Session::flash('error', trans('messages.error'));
                return back();
            }
            Session::flash('success', trans('messages.paymentaddedSuccessfully'));
            return redirect('/parent-login');
        } else {
            Session::flash('error', trans('messages.error'));
            return redirect('/parent-login');
        }
    }
    public function paymentFailed($paymentId)
    {
        $paymentToken = Crypt::decrypt($paymentId);
        $payment = ParentPayment::getPaymentToken($paymentToken);
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $paymentResponse = $stripe->checkout->sessions->retrieve(
            $payment->payment_request_id,
            []
        );
        $getParentPymenttoken = ParentPayment::getPaymentToken($paymentToken);
        if ($getParentPymenttoken) {
            $getData = ParentDetailHelper::getInquiryDetails($getParentPymenttoken->user_inquiry_id);
            $update = ParentDetailHelper::update(array('payment_status' => 'Failed', 'payment_token' => null, 'updated_at' => date('Y-m-d H:i:s')), array('user_id' => $getData->user_id, 'tutor_id' => $getData->tutor_id, 'subject_id' => $getData->subject_id, 'level_id' => $getData->level_id, 'tuition_day' => $getData->tuition_day, 'tuition_time' => $getData->tuition_time));
            Session::flash('error', trans('messages.error'));
            return redirect('/parent-login');
        }
    }
}
