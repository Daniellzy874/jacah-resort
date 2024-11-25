<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryImage;
use App\Models\Customer;
use App\Models\panorama;
use App\Models\RoomList;
use App\Models\Testimonials;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\alert;

class RoomController extends Controller
{
    function index()
    {
        if (!Auth::id()) {
            $data = Category::all();
            $panoCount = panorama::all()->count();
            return view('CustomerUI\page\room', ['data' => $data], ['panoCount' => $panoCount]);
        } else {

            return redirect()->route('redirect');
        }
    }
    function redirect()
    {
        $usertype = Auth::user()->role;
        if ($usertype == "user") {
            $data = Category::all();
            $panoCount = panorama::all()->count();
            return view('CustomerUI\page\room', ['data' => $data], ['panoCount' => $panoCount]);
        } else {
            $countCustomer = Customer::all()->count();
            $countCategories = Category::all()->count();
            $countRoomList = RoomList::all()->count();
            return view('dashboard', ['countCustomer' => $countCustomer, 'countCategories' => $countCategories, 'countRoomList' => $countRoomList]);
        }
    }
    function home()
    {
        return view('CustomerUI\page\home');
    }
    function show($id)
    {
        $user = User::find($id);

        return response()->json($user);
    }

    function payment($id)
    {
        $data = Category::find($id);
        $category = Category::with('productImages')->get();
        $imageCarousel = CategoryImage::all()->where('category_id', $id);
        return view('CustomerUI\page\payment', ['data' => $data, 'category' => $category, 'imageCarousel' => $imageCarousel]);
    }
    function json()
    {
        $data = Category::all();
        return $data;
    }
    function json_image()
    {
        $data = Category::all()->category;

        return $data;
    }
    function json_roomlist()
    {
        $count = RoomList::all();
        return $count;
    }
    function json_room($id)
    {
        $data = RoomList::find($id);
        return $data;
    }
    function panorama()
    {
        $data = panorama::all();
        return $data;
    }
    function modalitem($id)
    {
        $data = Category::find($id);
        return $data;
    }
    function modal($id)
    {
        echo $id;
    }
    function reserve(Request $request)
    {
        $firstname = $_GET['firstname'];
        $lastname = $_GET['lastname'];
        $email = $_GET['email'];
        $mobile = $_GET['mobile'];
        $book = $_GET['reserve_for'];
        $category = $_GET['Category'];
        $start = $_GET['startDate'];
        $end = $_GET['endDate'];

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $customer = new Customer();
            $customer->firstname = $_POST[$firstname];
            $customer->lastname = $_POST[$lastname];
            $customer->email = $_POST[$email];
            $customer->mobile_number = $_POST[$mobile];
            $customer->reserve_for = $_POST[$book];
            $customer->category = $_POST[$category];
            $customer->check_in = $_POST[$start];
            $customer->check_out = $_POST[$end];

            $customer->save();
            return view('CustomerUI\page\payment');
        }
    }
    function innerjoin()
    {
        $result = CategoryImage::all();
        return $result;
    }

    function innerjoins()
    {
        $category = Category::with('productImages')->get();
        $cat_img = CategoryImage::with('category')->get();

        return $category;
    }
    function json_category($id)
    {
        $category = Category::with('productImages')->find($id);
        $cat_img = CategoryImage::with('category')->get();

        return $category;
    }
    function testimony(Request $request)
    {
        $cus_id = Auth::user()->id;

        $text = new Testimonials();
        $text->customer_id = $cus_id;
        $text->testimony = $request->rating;
        $text->star = '5';
        $text->save();
        return redirect()->route('redirect');
    }
    function testimony_json()
    {
        $data = Testimonials::all();
        return $data;
    }
}

//  $customer->lastname = $request->lastname;
// $customer->email = $request->email;
// $customer->mobile_number = $request->mobile;
// $customer->reserve_for = $request->reserve_for;
// $customer->category = $request->Category;
// $customer->check_in = $request->startDate;
// $customer->check_out = $request->endDate;