@extends('adminPanel')
@section('content')
@php
$permission = Auth::user();
@endphp
<div class="container" style="padding: 20px">
@if (session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if ($permission->servicePermission == 'edit')
    <div class="row">
        <div class="container" style="padding: 15px; border: solid 2px gray">
            <a type="button" href="/addServices/create" class="btn btn-success">Add</a>
        </div>
    </div>
    @endif
    

    <div class="row">

        <table class="table" style="border: solid 2px gray">
            <thead>
                <tr>
                    <th scope="col">Sn</th>
                    <th scope="col">Topic</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    

                </tr>
            </thead>
            <tbody>
            @foreach ( $row as $key=>$d)
                <tr>
                    <!-- <th scope="row">1</th> -->
                    <td>{{$key + 1}}</td>
                    <td>{{$d->topic}}</td>
                    <td>@if ($d->active == "true") 
                        <a type="button" class="btn btn-success"
                        href="{{$permission->sliderPermission == 'edit'? '/serviceManager/'.$d->id.'/status' : ''}}">Active</a> 
                        @else
                        <a type="button" class="btn btn-danger"
                        href="{{$permission->sliderPermission == 'edit'? '/serviceManager/'.$d->id.'/status' : ''}}">Disabled</a> 
                        @endif</td>
                    <td><form action="/addServices/{{$d->id}}/edit" method="get">
                        @csrf
                        <a href="/infrastractureManager/{{$d->id}}/view" class="btn btn-secondary">View</a>
                        @if ($permission->servicePermission == 'edit')

                        <button type="submit" class="btn btn-primary">Edit</button>
                        <button type="button" 
                            class="btn btn-danger passId delService" data-toggle="modal" data-target="#confirm-delete" data-id="{{$d->id}}"
                            >Delete</button>
                            @endif
                    </form> </td>
                    
                </tr>
               @endforeach
            </tbody>
        </table>

        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this item?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <form id="fdService" action="ok" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" id="deleteConfirm" class="btn btn-danger">Delete</button>
</form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection