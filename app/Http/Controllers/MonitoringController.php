<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Time_in_out;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Type\ObjectType;

class MonitoringController extends Controller
{
    function monitor_category()
    {
        return view('Monitoring/monitor');
    }
    function monitor_item()
    {
        return view('Monitoring/item');
    }
    function customer_arrived_json()
    {
        $posts = DB::table('customers')
            ->join('users', 'users.id', '=', 'customers.cus_id')
            ->select('users.isActive', 'customers.*')
            ->where('customers.status', '=', 'Arrived')
            ->get();
        return $posts;
    }
    function customer_notif_json()
    {
        $posts = Customer::all()->where('status', 'Pending');
        return $posts;
    }

    function Customer_Check_in($id)
    {


        $data = DB::table('users')
            ->join('customers', 'users.id', '=', 'customers.cus_id') // inner join between posts and users
            ->select('users.*', 'customers.*')
            ->where('customers.id', '=', $id)
            ->first();

        return view('Monitoring.monitor', compact('data'));
    }
}
