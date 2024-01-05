<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\position;
use App\Models\teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class addTeacher extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $permission = Auth::user();
        if (($permission == null) or !(($permission->servicePermission == "view") or ($permission->servicePermission == "edit"))){
            abort(403);
        }
        $data = teacher::get();
        $data2= position::get();
        return view("teacherManager")->with(['row'=>$data,
    'row2'=>$data2]);
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
        
        $data2= position::get();
        return view("addTeacher")->with('row2',$data2);
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
                'name' => 'required',
                'facebook' => 'required',
                'email' => 'required|email',
                'twitter' => 'required',
                'position' => 'required',
                'image' => 'required|mimes:png,jpg,jpeg|max:2048'
            ]
            );
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $file = $request->file('image');
        $filename = time() . '_' .$file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
        $table = new teacher();
        $table->active = "true";
        $table->name = $request->name;
        $table->position = $request->position;
        $table->email = $request->email;
        $table->facebook = $request->facebook;
        $table->twitter = $request->twitter;
        $table->image = $filename;
        $table->save();
        return redirect("teacherManager")->with('message','New Notice added Sucessfully');} else{
            return redirect("teacherManager")->with('message','File Not Uploaded');
        }
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
        $row = teacher::find($id);
        $row2 = position::get();
        //
        return view("addTeacher")->with([
            'edit' => true,
            'id' => $id,
            'row2' => $row2,
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
                'name' => 'required',
                'facebook' => 'required',
                'email' => 'required|email',
                'twitter' => 'required',
                'position' => 'required'
            ]
            );
        $row = teacher::find($id);
        $row->name = $request->name;
        $row->position = $request->position;
        $row->email = $request->email;
        $row->facebook = $request->facebook;
        $row->twitter = $request->twitter;
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
        $row = teacher::find($id);
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
