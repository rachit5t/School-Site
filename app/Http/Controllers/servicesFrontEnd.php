<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\service;
use Illuminate\Http\Request;

class servicesFrontEnd extends Controller
{
    //
    public function index()
    {
        //
        $data = service::get();
        return view("services")->with('row', $data);
    }
}
