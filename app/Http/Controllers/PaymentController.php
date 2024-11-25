<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\panorama;
use App\Models\RoomList;
use Illuminate\Contracts\Session\Session;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Number;

class PaymentController extends Controller
{
    function pay(Request $request)
    {
        $customer_id = Auth::user()->id;

        $data = new Customer();
        $data->cus_id = $customer_id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile_number = $request->mobile;
        $data->reserve_for = $request->room_num;
        $data->category = $request->reserve_for;
        $data->personCount = $request->pax;
        $data->time = $request->rate;
        $data->price = $request->roomprice;
        $data->down_payment = $request->downpayment;
        $data->entrance_fee = $request->entrancefee;
        $data->total_amount = $request->totalamount;
        $data->rem_balance = $request->rem_balance;
        $data->gcash_ref = $request->ref_number;
        $data->check_in = $request->startDate;
        $data->check_out = $request->endDate;
        $data->status = 'Pending';
        $data->save();
        $editStatus = RoomList::find($request->status);
        $editStatus->Status = 'Unavailable';
        $editStatus->update();


        // $data->productImages()->create([
        //     'customer_id' => $data->id,
        //     'user_id' => $user_id,
        //     'payment_method' => $payment_method,
        //     'amount' => $currency,
        //     'status' => $status,
        //     'trans_date' => $trans_date,
        // ]);

        $panoCount = panorama::all()->count();
        return redirect()->route('room')->with(['response' => $data], ['panoCount' => $panoCount]);
    }
}
