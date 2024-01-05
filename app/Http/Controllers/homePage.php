<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\slider;
use Illuminate\Http\Request;

class homePage extends Controller
{
    //
    public function index()
    {
        //
        $data = slider::get();
        return view("index")->with('row', $data);
    }
}
