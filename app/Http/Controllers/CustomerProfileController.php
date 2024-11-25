<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Time_in_out;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class CustomerProfileController extends Controller
{
    function profile(Request $request)
    {
        return view('CustomerUI.page.customerProfile.customerprofile',  [
            'user' => $request->user(),
        ]);
    }
    function transaction()
    {
        return view('CustomerUI.page.transaction');
    }
    function booking_json()
    {
        $active = Auth::user()->email;
        $result = DB::table('users')
            ->join('customers', 'users.email', '=', 'customers.email')
            ->select('customers.reserve_for', 'customers.category', 'customers.check_in', 'customers.check_out', 'customers.created_at')
            ->where('customers.email', '=', $active)
            ->get();
        return $result;
    }
    function payment_json()
    {

        $active = Auth::user()->id;
        $result = DB::table('users')
            ->join('payment_tracks', 'users.id', '=', 'payment_tracks.user_id')
            ->select('payment_tracks.payment_method', 'payment_tracks.amount', 'payment_tracks.status', 'payment_tracks.created_at')
            ->where('payment_tracks.user_id', '=', $active)
            ->get();
        return $result;
    }
    function booking()
    {
        return view('CustomerUI.page.booking');
    }
    function notifications()
    {
        return view('CustomerUI.page.notifications');
    }
    function time_in(Request $request)
    {
        $id = $request->ref;

        $insert = Customer::find($id);
        $insert->Date_in = $request->date_in;
        $insert->Date_out = '...';
        $insert->Time_in = $request->Time_in;
        $insert->Time_out = '...';
        $insert->status = 'Arrived';
        $insert->update();


        return redirect()->back();
    }
    function time_out(Request $request)
    {


        $insert = Customer::find($request->id);
        $insert->Date_out = $request->date_out;
        $insert->Time_out = $request->time_out;
        $insert->status = 'Done';
        $insert->update();
        return redirect()->back();
    }
    function verify_customer($id)
    {

        $data = Customer::find($id);
        $posts = User::where('id', $data->cus_id)->first();
        return view('verify-customer', compact('data', 'posts'));
    }
    function verify_now($ref)
    {
        $data = Customer::where('gcash_ref', $ref)->first();

        $verify = Customer::find($data->id);
        $verify->status = "Verified";
        $verify->update();

        return redirect()->back();
    }
    function decline_now($ref)
    {
        $data = Customer::where('gcash_ref', $ref)->first();

        $verify = Customer::find($data->id);
        $verify->status = "Decline";
        $verify->update();

        return redirect()->back()->withSuccess('The reservation was Denied!');
    }
}
