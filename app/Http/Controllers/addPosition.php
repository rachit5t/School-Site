<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class addPosition extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $permission = Auth::user();
        if (($permission == null) or !(($permission->servicePermission == "view") or ($permission->servicePermission == "edit"))){
            abort(403);
        }
        $data = teacher::get();
        return view("teacherManager")->with('row', $data);
    }

    /**
     * Show the form for creating a new resource.
     */ 
    public function create()
    {
        $permission = Auth::user();
        if (($permission == null) or !($permission->servicePermission == "edit")){
            abort(403);
        }
        return view("addPosition");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $permission = Auth::user();
        if (($permission == null) or !($permission->servicePermission == "edit")){
            abort(403);
        }
        $request->validate(
            [
                'position' => 'required'
            ]
            );
        $table = new position();
        $table->position = $request->position;
        $table->save();
        return redirect("teacherManager")->with('message','New Notice added Sucessfully');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = Auth::user();
        if (($permission == null) or !($permission->servicePermission == "edit")){
            abort(403);
        }
        $row = position::find($id);
        //
        return view("addPosition")->with([
            'edit' => true,
            'id' => $id,
            'row' => $row,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $permission = Auth::user();
        if (($permission == null) or !($permission->servicePermission == "edit")){
            abort(403);
        }
        $request->validate(
            [
                'position' => 'required'
            ]
            );
        $row = position::find($id);
        $row->position = $request->position;
        $row->save();
        return redirect("teacherManager")->with('message','Record Edited Sucessfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $permission = Auth::user();
        if (($permission == null) or !($permission->servicePermission == "edit")){
            abort(403);
        }
        $row = position::find($id);
        $row->delete();
        return redirect("teacherManager")->with('message','Deleted Sucessfully');
    }

    public function statusChanger(string $id)
    {
        $permission = Auth::user();
        if (($permission == null) or !($permission->servicePermission == "edit")){
            abort(403);
        }
        $row = teacher::find($id);
        if ($row->active == "true"){
            $row->active = "false";
        } else{
            $row->active = "true";
        }
        $row->save();
        return redirect("teacherManager")->with('message','Status was changed');
    }

    public function viewer(string $id)
    {
        $permission = Auth::user();
        if (($permission == null) or !(($permission->servicePermission == "view") or ($permission->servicePermission == "edit"))){
            abort(403);
        }
        $row = teacher::find($id);
        return view("viewTeacher")->with('row', $row);
    }
}
