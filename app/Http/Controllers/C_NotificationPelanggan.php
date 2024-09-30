<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PelangganNotif;
use App\Models\CounterNotifPelanggan;
use App\Models\UserPelanggan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Log;
class C_NotificationPelanggan extends Controller
{
    //
    public $userPelanggan;

    public function __construct()
    {

        $this->userPelanggan = new UserPelanggan;

    }
    public function fetchNotifications(Request $request)
    {
        // Assuming you have the user's ID stored in the session or through authentication
        // $id_pelanggan = auth()->user()->id;
        if (session()->has('guest')) {

            $userPelanggan = $this->userPelanggan->firstUserPelangganWhere('id_pelanggan', '=', session::get('guest'));
        }
        // Fetch unread notifications
        $notifications = PelangganNotif::where('id_pelanggan', $userPelanggan->id_pelanggan)
                                        ->where('status_notif', 'unread')
                                        ->orderBy('tgl_notif', 'desc')
                                        ->take(5) // Limit to last 5 notifications
                                        ->get();
        $notificationsCounter = CounterNotifPelanggan::where('id_pelanggan',$userPelanggan->id_pelanggan)
        ->first();
        // Return JSON response
        return response()->json([
            'notifications' => $notifications,
            'unread_count' => $notificationsCounter->unread_notif,
        ]);
    }

    public function markAsRead(Request $request)
    {

        // Mark all notifications for the authenticated user as read
        if (session()->has('guest')) {
            // Retrieve guest user from session
            $userPelanggan = $this->userPelanggan->firstUserPelangganWhere('id_pelanggan', '=', session()->get('guest'));
        }

        // Ensure that a userPelanggan object is present
        if (!$userPelanggan) {
            return response()->json(['status' => 'error', 'message' => 'User not found'], 404);
        }

        // Log::info('Marking notification as read. ID: ' . $id);
        // dd($id);
        // Find the notification by ID and make sure it belongs to the correct user
        $notification = PelangganNotif::
            where('id_pelanggan', $userPelanggan->id_pelanggan)
            ->where('id_notif', $request->input('id'))
            ->first();

        if ($notification) {
            // Mark the notification as read
            DB::table('pelanggan_notif')
            ->where('id_notif',$request->input('id'))
            ->update(['status_notif'=>'read']);

            return response()->json(['status' => 'success']);
        }

        // Return error if notification is not found
        return response()->json(['status' => 'error', 'message' => 'Notification not found'], 404);
    }
// "SQLSTATE[42S22]: Column not found: 1054 Unknown column 'id' in 'where clause' (SQL: update `pelanggan_notif` set `status_notif` = read, `pelanggan_notif`.`updated_at` = 2024-09-24 10:49:38 where `id` is null)"
    // "SQLSTATE[42S22]: Column not found: 1054 Unknown column 'status_notif' in 'field list' (SQL: update `user_pelanggan` set `status_notif` = 'read' where `id_pelanggan` = 1)"
}
