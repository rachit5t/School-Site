@extends('adminPanel')
@section('content')
<div class="container" style="padding: 20px">
    @if (session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row">
        <div class="container" style="padding: 15px; border: solid 2px gray">
            <a type="button" href="/addSchedule/create" class="btn btn-success">Add</a>
        </div>
    </div>


    <div class="row">

        <table class="table" style="border: solid 2px gray">
            <thead>
                <tr>
                    <th scope="col">Sn</th>
                    <th scope="col">Class</th>
                    <th scope="col">Action</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($row as $key=>$data)
                <tr>
                    <!-- <th scope="row">1</th> -->
                    <td>{{$key+1}}</td>
                    <td>{{$data->name}}</td>
                    <td><form action="/addSchedule/{{$data->class_id}}/edit" method="get">
                        @csrf
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <button type="button"
                            class="btn btn-danger delSchedule" data-toggle="modal" data-target="#confirm-delete"
                            data-id="{{$data->class_id}}">Delete</button>
                    </form></td>

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
                        <form id="fdSchedule" action="" method="post">
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