<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\classList;
use App\Models\row;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\ClassLike;

class scheduleView extends Controller
{
    //
    public function index(){
        $ClassList = classList::get();
        $RowList = row::get();
        return view('classSchedule')->with(['ClassList'=>$ClassList, 'RowList'=>$RowList]);
    }
}
