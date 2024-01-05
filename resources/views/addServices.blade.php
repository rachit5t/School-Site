@extends('adminPanel')
@section('content')
@php
if (empty($edit)) {
    $edit = false;
    $action = "/addServices";
} else {
    $action = "/addServices/".$row->id;
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
                <label for="topic">Topic | बिषय</label>
                <input type="text" class="form-control" placeholder="topic" name="topic" value="{{ $edit ? $row->topic : '' }}">
                @error('topic')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col">
                <label for="topic">Photo | फोटो</label>
                @if ($edit)
                @php
                $path = "images/".$row->photo;
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

        <div class="row">
            <label id="detailsLabel" for="details">description | 
            विवरण</label>
            <div class="col"></div>
            <textarea name="details" class="form-control" rows="10" placeholder="Enter Details...">{{ $edit ? $row->details : '' }}</textarea>
            @error('details')
                <span class="text-danger">{{$message}}</span>
                @enderror
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