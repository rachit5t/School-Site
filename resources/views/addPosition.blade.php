@extends('adminPanel')
@section('content')
@php
if (empty($edit)) {
    $edit = false;
    $action = "/addPosition";
} else {
    $action = "/addPosition/".$row->id;
}  
@endphp

<div class="container" style="padding: 20px">
    <form action="{{$action}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @if (!empty($edit))
        @method('PUT')
        @endif
        <div class="row" style="margin-top: 10x; margin-bottom: 10px;">
            <div class="col">
                <label for="topic">Position | पद</label>
                <input type="text" class="form-control" placeholder="position" name="position" value="{{ $edit ? $row->position : '' }}">
                @error('name')
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