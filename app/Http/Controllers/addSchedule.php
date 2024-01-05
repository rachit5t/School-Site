<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\classList;
use App\Models\position;
use App\Models\row;
use App\Models\teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class addSchedule extends Controller
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
        $data = classList::get();
        return view("scheduleManager")->with('row', $data);
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
        return view("addSchedule");
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
        
        $allRowData = json_decode($request->getContent(), true);
        $table2 = new classList();
        $table2->name = $allRowData[0]['class'];
        $table2->save();
        
        foreach($allRowData as $key=>$Data){
            $table = new row();
            $table->time = $Data['time'];
            $table->class_id = $table2->class_id; 
            $table->sun = $Data['sunday']; 
            $table->mon = $Data['monday']; 
            $table->tue = $Data['tuesday']; 
            $table->wne = $Data['wednesday']; 
            $table->thu = $Data['thusday']; 
            $table->fri = $Data['friday']; 
            // $table->sun = 'sunday'; 
            // $table->mon = 'monday'; 
            // $table->tue = 'tuesday'; 
            // $table->wne = 'wednesday'; 
            // $table->thu = 'thusday'; 
            // $table->fri = 'friday'; 
            $table->save();
        }
        return response($request);
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
        $row = classList::find($id);
        $row2 = row::where("class_id", $id)->get();
        //
        return view("addSchedule")->with([
            'edit' => true,
            'id' => $id,
            'row' => $row,
            'row2' => $row2
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

    public function editForm(Request $request){
        $allRowData = json_decode($request->getContent(), true);
        foreach($allRowData as $key=>$Data){
            $table = row::find($Data['row_id']);
            if($table == null){
                $tableTwo = new row();
                $tableTwo->time = $Data['time'];
                $tableTwo->class_id = $Data['class_id']; 
                $tableTwo->sun = $Data['sunday']; 
                $tableTwo->mon = $Data['monday']; 
                $tableTwo->tue = $Data['tuesday']; 
                $tableTwo->wne = $Data['wednesday']; 
                $tableTwo->thu = $Data['thusday']; 
                $tableTwo->fri = $Data['friday'];
                $tableTwo->save();
            } else{
                $table->time = $Data['time']; 
                $table->sun = $Data['sunday']; 
                $table->mon = $Data['monday']; 
                $table->tue = $Data['tuesday']; 
                $table->wne = $Data['wednesday']; 
                $table->thu = $Data['thusday']; 
                $table->fri = $Data['friday'];
                $table->save();
            }
        }
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
        
        $row1 = classList::where('class_id', $id)->get();
        $row2 = row::where('class_id',$row1[0]->class_id)->get();
        foreach($row2 as $item){
            $item->delete();
        }
        $row1[0]->delete();
        return redirect("scheduleManager")->with('message','Deleted Sucessfully');
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
