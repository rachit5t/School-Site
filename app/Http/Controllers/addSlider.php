<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\slider;
use Illuminate\Http\Request;
use App\Models\notice;
use Illuminate\Support\Facades\Auth;

class addSlider extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $permission = Auth::user();
        if (($permission == null) or !(($permission->sliderPermission == "view") or ($permission->sliderPermission == "edit"))){
            abort(403);
        }
        $data = slider::get();
        return view("slider")->with('row', $data);
    }

    /**
     * Show the form for creating a new resource.
     */ 
    public function create()
    {
        $permission = Auth::user();
        if (($permission == null) or !($permission->sliderPermission == "edit")){
            abort(403);
        }
        return view("addSlider");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $permission = Auth::user();
        if (($permission == null) or !($permission->sliderPermission == "edit")){
            abort(403);
        }
        $request->validate(
            [
                'name' => 'required',
                'image' => 'required|mimes:png,jpg,jpeg|max:2048'
            ]
            );
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $file = $request->file('image');
        $filename = time() . '_' .$file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
        $table = new slider();
        $table->active = "true";
        $table->name = $request->name;
        $table->photo = $filename; 
        $table->save();
        return redirect("slider")->with('message','New Notice added Sucessfully');} else{
            return redirect("slider")->with('message','File Not Uploaded');
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
        if (($permission == null) or !($permission->sliderPermission == "edit")){
            abort(403);
        }
        $row = slider::find($id);
        //
        return view("addSlider")->with([
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
        if (($permission == null) or !($permission->sliderPermission == "edit")){
            abort(403);
        }
        $request->validate(
            [
                'name' => 'required'
            ]
            );
        $row = slider::find($id);
        $row->name = $request->name;
        $row->save();
        return redirect("slider")->with('message','Record Edited Sucessfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $permission = Auth::user();
        if (($permission == null) or !($permission->sliderPermission == "edit")){
            abort(403);
        }
        $row = slider::find($id);
        $row->delete();
        return redirect("slider")->with('message','Deleted Sucessfully');
    }

    public function statusChanger(string $id)
    {
        $permission = Auth::user();
        if (($permission == null) or !($permission->sliderPermission == "edit")){
            abort(403);
        }
        $row = slider::find($id);
        if ($row->active == "true"){
            $row->active = "false";
        } else{
            $row->active = "true";
        }
        $row->save();
        return redirect("slider")->with('message','Status was changed');
    }

    public function viewer(string $id)
    {
        $permission = Auth::user();
        if (($permission == null) or !(($permission->sliderPermission == "view") or ($permission->sliderPermission == "edit"))){
            abort(403);
        }
        $row = slider::find($id);
        return view("viewSlider")->with('row', $row);
    }
}
