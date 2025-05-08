<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Notifications\AdminHourlyRateNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.notification.notification');
    }
    public function unreadNotification()
    {
        $currentDate = date("Y-m-d");
        $unreadNotification = auth()->user()->unreadNotifications()->whereDate('created_at', $currentDate)->orderBy('created_at', 'desc')->get();
        return response()->json($unreadNotification);
    }
    public function markAsRead(Request $request)
    {
        $notificationId = $request->route('id');
        $userUnreadNotification = auth()->user()->unreadNotifications
            ->where('id', $notificationId)
            ->first();
        if ($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
            return response()->json(['error_msg' => "Notification Read Successfully.", 'data' => '', 'status' => 1], 200);
        } else {
            return response()->json(['error_msg' => "Sorry, something went wrong. Please try again.", 'data' => '', 'status' => 0], 500);
        }
    }
}
