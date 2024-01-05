<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\notice;
use Illuminate\Http\Request;
use Route;
use Illuminate\Support\Facades\Auth;

class addNotice extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $permission = Auth::user();
        if (($permission == null) or !(($permission->noticePermission == "view") or ($permission->noticePermission == "edit"))){
            abort(403);
        }
        
        $data = notice::get();
        return view("noticeManager")->with('row', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission = Auth::user();
        if (($permission == null) or !($permission->noticePermission == "edit")){
            abort(403);
        }
        return view("addNotice");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $permission = Auth::user();
        if (($permission == null) or !($permission->noticePermission == "edit")){
            abort(403);
        }
        $request->validate(
            [
                'date' => 'required',
                'topic' => 'required',
                'details' => 'required',
                'writer' => 'required'
            ]
            );
        $table = new notice();
        $table->active = "true";
        $table->date = $request->date;
        $table->topic = $request->topic;
        $table->details = $request->details;
        $table->writer = $request->writer;
        $table->save();
        return redirect("noticeManager")->with('message','New Notice added Sucessfully');
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
        if (($permission == null) or !($permission->noticePermission == "edit")){
            abort(403);
        }
        $row = notice::find($id);
        //
        return view("addNotice")->with([
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
        if (($permission == null) or !($permission->noticePermission == "edit")){
            abort(403);
        }
        $request->validate(
            [
                'date' => 'required',
                'topic' => 'required',
                'details' => 'required',
                'writer' => 'required'
            ]
            );
        $row = notice::find($id);
        $row->date = $request->date;
        $row->topic = $request->topic;
        $row->details = $request->details;
        $row->writer = $request->writer;
        $row->save();
        return redirect("noticeManager")->with('message','Record Edited Sucessfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $permission = Auth::user();
        if (($permission == null) or !($permission->noticePermission == "edit")){
            abort(403);
        }
        $row = notice::find($id);
        $row->delete();
        return redirect("noticeManager")->with('message','Deleted Sucessfully');
    }

    public function statusChanger(string $id)
    {
        $permission = Auth::user();
        if (($permission == null) or !($permission->noticePermission == "edit")){
            abort(403);
        }
        $row = notice::find($id);
        if ($row->active == "true"){
            $row->active = "false";
        } else{
            $row->active = "true";
        }
        $row->save();
        return redirect("noticeManager")->with('message','Status was changed');
    }

    public function viewer(string $id)
    {
        $permission = Auth::user();
        if (($permission == null) or !(($permission->noticePermission == "view") or ($permission->noticePermission == "edit"))){
            abort(403);
        }
        $row = notice::find($id);
        return view("viewNotice")->with('row', $row);
    }

}
