<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use App\Models\CategoryImage;
use App\Models\Customer;
use App\Models\panorama;
use App\Models\RoomList;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function dashboard()
    {
        $countCustomer = Customer::all()->count();
        $countCategories = Category::all()->count();
        $countRoomList = RoomList::all()->count();
        return view('dashboard', ['countCustomer' => $countCustomer, 'countCategories' => $countCategories, 'countRoomList' => $countRoomList]);
    }
    function customer()
    {
        $cus = DB::table('customers')
            ->where('status', 'Pending')->get();

        return view('customer', ['cus' => $cus]);
    }
    function customer_json()
    {
        $cus = Customer::all();;
        return $cus;
    }
    function category()
    {
        return view('category');
    }
    function report()
    {
        return view('report');
    }
    function promo()
    {
        return view('promo');
    }
    function composePromo(Request $request)
    {
        $data = new Announcement();

        $photo = $request->promoImage;
        $promoimage = time() . '.' . $photo->getClientOriginalExtension();
        $request->promoImage->move('./assets/image/announcement', $promoimage);

        $data->photo = $promoimage;
        $data->name = $request->promoHeader;
        $data->description = $request->promoDescription;
        $data->save();

        return redirect()->back();
    }
    function promo_json()
    {
        $data = Announcement::all();
        return $data;
    }
    function roomlist()
    {
        $data = RoomList::all();
        return view('roomlist', ['data' => $data]);
    }
    function savecategory(Request $request)
    {

        $request->validate([
            'category' => ['unique:' . Category::class],
        ]);
        $categoryList = new Category();
        $categoryList->category = $request->category;
        $categoryList->Day_Rate = $request->dayprice;
        $categoryList->Night_Rate = $request->nightprice;
        $categoryList->pax = $request->pax;
        $categoryList->save();

        if ($files = $request->file('image')) {
            $upload_path = './assets/image/amenity_pic/';
            $i = 1;
            foreach ($files as $file) {
                $ext = $file->getClientOriginalExtension();
                $image_full_name = time() . $i++ . '.' . $ext;
                $file->move($upload_path, $image_full_name);
                $finalImagePathName = $upload_path . $image_full_name;

                $categoryList->productImages()->create([
                    'category_id' => $categoryList->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }

        return redirect()->back()->withSuccess('added successfully!');
    }
    function editcategory(Request $request)
    {
        $ID = $request->CategoryID;
        $categoryList = Category::find($ID);
        $categoryList->category = $request->category;
        $categoryList->Day_Rate = $request->dayprice;
        $categoryList->Night_Rate = $request->nightprice;
        $categoryList->pax = $request->pax;
        $categoryList->save();

        if ($files = $request->file('image')) {
            $upload_path = '/assets/image/amenity_pic/';
            $i = 1;
            foreach ($files as $file) {
                $ext = $file->getClientOriginalExtension();
                $image_full_name = time() . $i++ . '.' . $ext;
                $file->move($upload_path, $image_full_name);
                $finalImagePathName = $upload_path . $image_full_name;

                $categoryList->productImages()->create([
                    'category_id' => $categoryList->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }

        return redirect()->back()->withSuccess('updated successfully!');
    }
    function deletecategory(Request $request)
    {
        $ID = $request->CategoryID;
        $name = $request->category;
        Category::destroy($ID);
        RoomList::where("Category", $name)->delete();
        return redirect()->back()->withSuccess('deleted successfully!');
    }

    function saveroom(Request $request)
    {
        $roomNum = $request->Room_num;
        $cat = $request->Category;
        $Query = DB::table('room_lists')
            ->where('Room', $roomNum)
            ->where('Category', $cat)
            ->count();
        if ($Query == 0) {
            $categoryList = new RoomList();
            $categoryList->Room = $request->Room_num;
            $categoryList->Category = $request->Category;
            $categoryList->Status = $request->RoomStatus;
            $categoryList->save();
            return redirect()->back()->withSuccess('added successfully!');
        } else {
            return redirect()->back()->withErrors('Failed! Room is already exist in category.');
        }
    }
    function editroom(Request $request)
    {
        $ID = $request->RoomID;
        $categoryList = RoomList::find($ID);

        $categoryList->Room = $request->Room_num;
        $categoryList->Category = $request->Category;
        $categoryList->Status = $request->RoomStatus;
        $categoryList->save();
        return redirect()->back()->withSuccess('updated successfully!');
    }
    function deleteroom(Request $request)
    {
        $ID = $request->RoomID;
        RoomList::find($ID)->delete();
        return redirect()->back()->withSuccess('deleted successfully!');
    }
    function category_json()
    {
        $cat = Category::all();
        return $cat;
    }
    function Image_json()
    {
        $cat = CategoryImage::all();
        return $cat;
    }
    function room_json()
    {
        $room = RoomList::all();
        return $room;
    }
    function panorama()
    {
        $data = Panorama::all();
        return view('panorama', ['data' => $data]);
    }
    function panorama_json()
    {
        $data = Panorama::all();
        return $data;
    }
    function panorama_save(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:' . panorama::class],
        ]);


        $roomlist = new panorama();

        $photo = $request->panImage;
        $productimage = time() . '.' . $photo->getClientOriginalExtension();
        $request->panImage->move('./assets/image/panorama', $productimage);

        $roomlist->image = $productimage;
        $roomlist->name = $request->name;
        $roomlist->type = $request->type;
        $roomlist->save();

        return redirect()->back()->withSuccess("$request->name added successfully!");
    }
    function panorama_edit(Request $request)
    {
        $ID = $request->panID;
        $roomlist = Panorama::find($ID);

        // $photo = $request->panImage;
        // $productimage = time() . '.' . $photo->getClientOriginalExtension();
        // $request->panImage->move('./assets/image/panorama', $productimage);

        // $roomlist->image = $productimage;
        $roomlist->name = $request->name;
        $roomlist->type = $request->type;
        $roomlist->save();


        return redirect()->back()->withSuccess('updated successfully!');
    }
    function panorama_delete(Request $request)
    {
        $ID = $request->panID;
        panorama::destroy($ID);
        return redirect()->back()->withSuccess('deleted successfully!');
    }
    function ratejson($cat, $room)
    {
        $category = Customer::where('category', $cat)
            ->where('reserve_for', $room)
            ->first();
        $data = Customer::all();
        return $category;
    }
}
