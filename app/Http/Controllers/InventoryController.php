<?php

namespace App\Http\Controllers;

use App\Models\Category_Inventory;
use App\Models\InventoryProduct;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    function inventCat_json()
    {
        $data = Category_Inventory::all();
        return $data;
    }
    function category()
    {
        return view('inventory.category');
    }
    function customer()
    {
        return view('inventory.customer');
    }
    function product()
    {
        return view('inventory.product');
    }
    function create_category(Request $request)
    {
        $val = Category_Inventory::where('name', $request->catName)->count();
        if ($val === 0) {
            $cateData = new Category_Inventory();
            $cateData->name = $request->catName;
            $cateData->save();

            return redirect()->back()->withSuccess('added successfully!');
        } else {
            return redirect()->back()->withErrors('Failed!');
        }
    }
    function update_category(Request $request)
    {
        $id = $request->cat_id;
        $cateData = Category_Inventory::find($id);
        $cateData->name = $request->catName;
        $cateData->save();

        return redirect()->back()->withSuccess('Updated successfully!');
    }
    function delete_category(Request $request)
    {
        $id = $request->cat_id;
        $name = $request->catName;
        $cateData = Category_Inventory::find($id);
        $cateData->delete();
        InventoryProduct::where('category', $name)->delete();

        return redirect()->back()->withSuccess('deleted successfully!');
    }
}
