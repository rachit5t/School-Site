<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class addServices extends Controller
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
        $data = service::get();
        return view("infrastractureManager")->with('row', $data);
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
        return view("addServices");
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
                'topic' => 'required',
                'details' => 'required',
                'image' => 'required|mimes:png,jpg,jpeg|max:2048'
            ]
            );
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $file = $request->file('image');
        $filename = time() . '_' .$file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
        $table = new service();
        $table->active = "true";
        $table->topic = $request->topic;
        $table->details = $request->details;
        $table->photo = $filename; 
        $table->save();
        return redirect("infrastractureManager")->with('message','New Notice added Sucessfully');} else{
            return redirect("infrastractureManager")->with('message','File Not Uploaded');
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
        $row = service::find($id);
        //
        return view("addServices")->with([
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
                'topic' => 'required',
                'details' => 'required'
            ]
            );
        $row = service::find($id);
        $row->topic = $request->topic;
        $row->details = $request->details;
        $row->save();
        return redirect("infrastractureManager")->with('message','Record Edited Sucessfully');

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
        $row = service::find($id);
        $row->delete();
        return redirect("infrastractureManager")->with('message','Deleted Sucessfully');
    }

    public function statusChanger(string $id)
    {
        $permission = Auth::user();
        if (($permission == null) or !($permission->servicePermission == "edit")){
            abort(403);
        }
        $row = service::find($id);
        if ($row->active == "true"){
            $row->active = "false";
        } else{
            $row->active = "true";
        }
        $row->save();
        return redirect("infrastractureManager")->with('message','Status was changed');
    }

    public function viewer(string $id)
    {
        $permission = Auth::user();
        if (($permission == null) or !(($permission->servicePermission == "view") or ($permission->servicePermission == "edit"))){
            abort(403);
        }
        $row = service::find($id);
        return view("viewServices")->with('row', $row);
    }
}
