<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\position;
use App\Models\teacher;
use Illuminate\Http\Request;

class teacherController extends Controller
{
    //
    public function index()
    {
        //
        $data = teacher::get();
        $data2 = position::get();
        return view("teachers")->with(['row'=>$data, 'row2'=>$data2]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function applyFilters($filterKey)
    {
        $data2 = position::get();
        if ($filterKey == "all"){
            $data = teacher::get();
            return view("teachers")->with(['row'=>$data, 'row2'=>$data2, 'filter'=>"all"]);
        }else{
            $data = teacher::where('position', $filterKey)->get();
            return view("teachers")->with(['row'=>$data, 'row2'=>$data2, 'filter'=>$filterKey]);
        }
    }

}
