@extends('adminPanel')
@section('content')

<div class="container" style="padding: 20px">
    <form>
    {{ csrf_field() }}
        <div class="row">
            <div class="col">
                <label for="topic">Topic | बिषय</label>
                <input type="text" class="form-control" placeholder="topic" name="topic" value="{{$row->topic}}" readonly="readonly">
            </div>
            <div class="col">
                <label for="topic">Photo | फोटो</label>
                @php
                $path = "images/".$row->photo;
                @endphp
                <img src="{{asset($path)}}" alt="" style="height: 300px;">
                
            </div>
        </div>

        <div class="row">
            <label id="detailsLabel" for="details">description | 
            विवरण</label>
            <div class="col"></div>
            <textarea name="details" class="form-control" rows="10" placeholder="Enter Details..." readonly="readonly">{{$row->details}}</textarea>
        </div>

</div>


</form>
</div>

@endsection