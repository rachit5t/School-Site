@extends('adminPanel')
@section('content')
<div class="container" style="padding: 20px">
    <div class="row">
        <div class="container" style="padding: 15px; border: solid 2px gray">
            <a type="button" href="" class="btn btn-success">Add</a>
        </div>
    </div>
    

    <div class="row">

        <table class="table" style="border: solid 2px gray">
            <thead>
                <tr>
                    <th scope="col">Sn</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    

                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <!-- <th scope="row">1</th> -->
                    <td>1</td>
                    <td>Name</td>
                    <td><img src="{{asset('img/test.jpg')}}" style="height: 50px;" alt=""></td>
                    <td><a type="button" class="btn btn-success"
                        href="">Active</a> </td>
                    <td><a type="button" class="btn btn-primary"
                            href="">Edit</a> <button type="button"
                            class="btn btn-danger passId" data-toggle="modal" data-target="#confirm-delete"
                            data-id="">Delete</button></td>
                    
                </tr>
               
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
                        <a id="deleteConfirm" href="/delete-item" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection