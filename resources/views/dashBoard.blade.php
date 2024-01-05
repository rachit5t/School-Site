@extends('adminPanel')
@section('content')
<div class="container" style="padding: 20px; padding-top: 50px;">
    <form>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Retype Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Retype Password">
        </div>


        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">I remember my password</label>
        </div>
        <button type="submit" class="btn btn-primary">Change Password</button>
    </form>
</div>

@endsection