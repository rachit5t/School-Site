@extends('adminPanel')
@section('content')
@php
if (empty($edit)) {
    $edit = false;
    $action = "/addSchedule";
} else {
    $action = "/addSchedule/".$row->id;
}  
@endphp

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .mainArea {
        display: flex;
        justify-content: center;
    }

    .scheduleContainer {
        padding: 5%;
        min-width: 90%;
    }

    .tableInput {
        height: 100%;
        width: 100%;
    }

    .heading {
        font-weight: bolder;
    }

    .classContainer {
        display: flex;
        flex-direction: column;
        padding: 20px;
    }


    .classContainer>h1>input {
        padding: 10px;
        font-weight: bolder;
        height: 100%;
        width: 100%;
        text-align: center;
    }

    thead>tr>th {
        background-color: rgb(94, 94, 194);
        color: rgb(255, 255, 255);
    }

    .tableInput {
        background-color: transparent;
        border: none;
    }
</style>

<div class="scheduleContainer">
    
    <div class="classContainer">
        <h1><input type="text" class="" id="tableHead" value="{{ $edit ? $row->name : 'सिसु' }}"
                style="background-color: transparent; border: none;"></h1>
        <table class="table table-striped">
            <input type="hidden" id="clas_id" name="class_id" value="{{$edit ? $row->class_id : '' }}">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">आइतबार</th>
                    <th scope="col">सोमबार</th>
                    <th scope="col">मंगलबर</th>
                    <th scope="col">बुधबार</th>
                    <th scope="col">बिहिबार</th>
                    <th scope="col">सुक्रबार</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @if($edit)
                @foreach($row2 as $k=>$dat)
                <tr class="tableRow">
                    <th scope="row"><input type="text" data-id="{{$edit ? $dat->row_id : '' }}" class="tableInput heading" id="" value="{{$dat->time}}"></th>
                    <td><input type="text" data-id="{{$edit ? $dat->row_id : '' }}" class="tableInput" id="" value="{{$dat->sun}}"></td>
                    <td><input type="text" data-id="{{$edit ? $dat->row_id : '' }}" class="tableInput" id="" value="{{$dat->mon}}"></td>
                    <td><input type="text" data-id="{{$edit ? $dat->row_id : '' }}" class="tableInput" id="" value="{{$dat->tue}}"></td>
                    <td><input type="text" data-id="{{$edit ? $dat->row_id : '' }}" class="tableInput" id="" value="{{$dat->wne}}"></td>
                    <td><input type="text" data-id="{{$edit ? $dat->row_id : '' }}" class="tableInput" id="" value="{{$dat->thu}}"></td>
                    <td><input type="text" data-id="{{$edit ? $dat->row_id : '' }}" class="tableInput" id="" value="{{$dat->fri}}"></td>
                </tr>
                @endforeach
                @else
                <tr class="tableRow">
                    <th scope="row"><input type="text" class="tableInput heading" id="" value="११-१२"></th>
                    <td><input type="text" class="tableInput" id="" value="सामाजिक"></td>
                    <td><input type="text" class="tableInput" id="" value="बिज्ञान"></td>
                    <td><input type="text" class="tableInput" id="" value="गडित"></td>
                    <td><input type="text" class="tableInput" id="" value="नेपाली"></td>
                    <td><input type="text" class="tableInput" id="" value="अंग्रजी"></td>
                    <td><input type="text" class="tableInput" id="" value="बयाकरण"></td>
                </tr>
                @endif
            </tbody>
        </table>

        <div class="rowController" style="display: flex; width: 100%; justify-content: center;">
            <div id="add" style="margin: 10px; margin-top: 0px;"><i class="fa-regular fa-square-plus fa-2xl"></i>
            </div>
            <div id="remove" style="margin: 10px; margin-top: 0px;"><i class="fa-regular fa-square-minus fa-2xl"></i>
            </div>
        </div>
        <div class="col">
            <label for="writer">&nbsp;</label>
            <button type="submit" id="{{$edit ? 'submitEdit' : 'submitTable' }}" class="form-control btn btn-primary" value="Submit" type="submit">Submit</button>
        </div>
    </div>
</div>
@endsection