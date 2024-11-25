<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\InventoryProduct;
use Illuminate\Http\Request;

class InventoryPoductController extends Controller
{

    function addProduct(Request $request)
    {
        // $request->validate([
        //     'category' => ['unique:' . Category::class],
        // ]);
        $val = InventoryProduct::where('name', $request->prod_name)->count();
        if ($val === 0) {
            $Product = new InventoryProduct();
            $Product->name = $request->prod_name;
            $Product->category = $request->category;
            $Product->quantity = $request->qty;
            $Product->price = $request->price;
            if ($files = $request->file('image')) {
                $upload_path = './assets/image/amenity_pic/';
                $i = 1;
                foreach ($files as $file) {
                    $ext = $file->getClientOriginalExtension();
                    $image_full_name = time() . $i++ . '.' . $ext;
                    $file->move($upload_path, $image_full_name);
                    $finalImagePathName = $upload_path . $image_full_name;

                    $Product->picture = $finalImagePathName;
                }
            }
            $Product->save();
            return redirect()->back()->withSuccess('added successfully!');
        } else {
            return redirect()->back()->withErrors('Failed!');
        }
    }
    function updateProduct(Request $request)
    {
        // $request->validate([
        //     'category' => ['unique:' . Category::class],
        // ]);
        $id = $request->prod_id;
        $Product = InventoryProduct::find($id);
        $Product->name = $request->prod_name;
        $Product->category = $request->category;
        $Product->quantity = $request->qty;
        $Product->price = $request->price;

        if ($files = $request->file('image')) {
            $upload_path = './assets/image/amenity_pic/';
            $i = 1;
            foreach ($files as $file) {
                $ext = $file->getClientOriginalExtension();
                $image_full_name = time() . $i++ . '.' . $ext;
                $file->move($upload_path, $image_full_name);
                $finalImagePathName = $upload_path . $image_full_name;

                $Product->picture = $finalImagePathName;
            }
        }
        $Product->update();
        return redirect()->back()->withSuccess('Updated successfully!');
    }
    function deleteProduct(Request $request)
    {
        $id = $request->prod_id;
        $Product = InventoryProduct::find($id);
        $Product->delete();
        return redirect()->back()->withSuccess('Deleted successfully!');
    }
    function listJson()
    {
        $data = InventoryProduct::all();
        return $data;
    }
    function itemProd($category)
    {
        $data = InventoryProduct::all()->where('category', $category);
        return $data;
    }
}
