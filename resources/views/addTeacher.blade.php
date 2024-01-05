@extends('adminPanel')
@section('content')
@php
if (empty($edit)) {
    $edit = false;
    $action = "/addTeacher";
} else {
    $action = "/addTeacher/".$row->id;
}  
@endphp

<div class="container" style="padding: 20px">
    <form action="{{$action}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @if (!empty($edit))
        @method('PUT')
        @endif
        <div class="row">
            <div class="col">
                <label for="topic">Name | नाम</label>
                <input type="text" class="form-control" placeholder="name" name="name" value="{{ $edit ? $row->name : '' }}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col">
                <label for="topic">Photo | फोटो</label>
                @if ($edit)
                @php
                $path = "images/".$row->image;
                @endphp
                <img src="{{asset($path)}}" alt="" style="height: 300px;">
                @else
                <input name="image" style="padding: 4px;" type="file" class="form-control">
                @error('image')
                <span class="text-danger">{{$message}}</span>
                @enderror
                @endif
            </div>
        </div>

        <div class="row" style="margin-top: 10x; margin-bottom: 10px;">
            <div class="col">
                <label for="topic">Position | पद</label>
                <!-- <input type="text" class="form-control" placeholder="position" name="p" value="{{ $edit ? $row->position : '' }}"> -->
                <select name="position" class="form-control">
                @foreach ( $row2 as $key=>$d)
                <option value="{{$d->position}}" {{$edit? ($row->position == $d->position ? 'selected' :'' ) : ''}} >{{$d->position}}</option>
                
  @endforeach
</select>
                @error('position')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col">
                <label for="topic">Facebook | फेसबुक</label>
                <input type="text" class="form-control" placeholder="facebook" name="facebook" value="{{ $edit ? $row->facebook : '' }}">
                @error('facebook')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row" style="margin-top: 10x; margin-bottom: 10px;">
            <div class="col">
                <label for="topic">Email | इमेल</label>
                <input type="text" class="form-control" placeholder="email" name="email" value="{{ $edit ? $row->email : '' }}">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col">
                <label for="topic">Twitter | ट्विटर</label>
                <input type="text" class="form-control" placeholder="twitter" name="twitter" value="{{ $edit ? $row->twitter : '' }}">
                @error('twitter')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        
        <div class="row">
            <div class="col">
            <button type="submit" class="form-control btn btn-primary">{{ $edit ? 'edit ' : 'Submit' }}</button>
            </div>
        </div>

</div>


</form>
</div>

@endsection