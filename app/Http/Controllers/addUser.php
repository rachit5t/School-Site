<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class addUser extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $permission = Auth::user();
        if (($permission == null) or !(($permission->userPermission == "view") or ($permission->userPermission == "edit"))){
            abort(403);
        }
        $data = User::get();
        return view("userManager")->with('row', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission = Auth::user();
        if (($permission == null) or !($permission->userPermission == "edit")){
            abort(403);
        }
        return view("addUser");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $permission = Auth::user();
        if (($permission == null) or !($permission->userPermission == "edit")){
            abort(403);
        }
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'sliderPermission' => 'required',
                'noticePermission' => 'required',
                'servicePermission' => 'required',
                'teacherPermission' => 'required',
                'schedulePermission' => 'required',
                'galleryPermission' => 'required',
                'userPermission' => 'required',
            ]
            );
        $table = new user();
        $table->name = $request->name;
            $table->email = $request->email;
            $table->active = "true";
            $table->password = bcrypt($request->password);
            $table->sliderPermission = $request->sliderPermission;
            $table->noticePermission = $request->noticePermission;
            $table->servicePermission = $request->servicePermission;
            $table->teacherPermission = $request->teacherPermission;
            $table->schedulePermission = $request->schedulePermission;
            $table->galleryPermission = $request->galleryPermission;
            $table->userPermission = $request->userPermission;
        $table->save();
        return redirect("userManager")->with('message','New User added Sucessfully');
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
        if (($permission == null) or !($permission->userPermission == "edit")){
            abort(403);
        }
        $row = user::find($id);
        //
        return view("addUser")->with([
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
        if (($permission == null) or !($permission->userPermission == "edit")){
            abort(403);
        }
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'sliderPermission' => 'required',
                'noticePermission' => 'required',
                'servicePermission' => 'required',
                'teacherPermission' => 'required',
                'schedulePermission' => 'required',
                'galleryPermission' => 'required',
                'userPermission' => 'required',
            ]
            );
        $table = user::find($id);
        $table->name = $request->name;
            $table->email = $request->email;
            $table->password = bcrypt($request->password);
            $table->userPermission = $request->userPermission;
            $table->noticePermission = $request->noticePermission;
            $table->servicePermission = $request->servicePermission;
            $table->teacherPermission = $request->teacherPermission;
            $table->schedulePermission = $request->schedulePermission;
            $table->galleryPermission = $request->galleryPermission;
            $table->userPermission = $request->userPermission;
        $table->save();
        return redirect("userManager")->with('message','Record Edited Sucessfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $permission = Auth::user();
        if (($permission == null) or !($permission->userPermission == "edit")){
            abort(403);
        }
        $row = user::find($id);
        $row->delete();
        return redirect("userManager")->with('message','Deleted Sucessfully');
    }

    public function statusChanger(string $id)
    {
        $permission = Auth::user();
        if (($permission == null) or !($permission->userPermission == "edit")){
            abort(403);
        }
        $row = user::find($id);
        if ($row->active == "true"){
            $row->active = "false";
        } else{
            $row->active = "true";
        }
        $row->save();
        return redirect("userManager")->with('message','Status was changed');
    }

    public function viewer(string $id)
    {
        $permission = Auth::user();
        if (($permission == null) or !(($permission->userPermission == "view") or ($permission->userPermission == "edit"))){
            abort(403);
        }
        $row = user::find($id);
        return view("viewUser")->with('row', $row);
    }
}
