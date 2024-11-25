<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CottageController extends Controller
{
    function index()
    {
        return view('CustomerUI\page\cottage');
    }
}
