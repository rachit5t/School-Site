@extends('adminPanel')
@section('content')

<div class="container" style="padding: 20px">
    <form >
    {{ csrf_field() }}
   
        <div class="row">
            <div class="col">
                <label for="topic">Name | नाम</label>
                <input readonly="readonly" type="text" class="form-control" placeholder="name" name="name" value="{{$row->name}}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col">
                <label for="topic">Photo | फोटो</label>
                @php
                $path = "images/".$row->image;
                @endphp
                <img src="{{asset($path)}}" alt="" style="height: 300px;">
            </div>
        </div>

        <div class="row" style="margin-top: 10x; margin-bottom: 10px;">
            <div class="col">
                <label for="topic">Position | पद</label>
                <input readonly="readonly" type="text" class="form-control" placeholder="position" name="position" value="{{$row->position}}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col">
                <label for="topic">Facebook | फेसबुक</label>
                <input readonly="readonly" type="text" class="form-control" placeholder="facebook" name="facebook" value="{{$row->facebook}}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row" style="margin-top: 10x; margin-bottom: 10px;">
            <div class="col">
                <label for="topic">Email | इमेल</label>
                <input readonly="readonly" type="text" class="form-control" placeholder="email" name="email" value="{{$row->email}}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col">
                <label for="topic">Twitter | ट्विटर</label>
                <input readonly="readonly" type="text" class="form-control" placeholder="twitter" name="twitter" value="{{$row->twitter}}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
</div>


</form>
</div>

@endsection