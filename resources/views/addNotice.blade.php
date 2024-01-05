@extends('adminPanel')
@section('content')
@php
if (empty($edit)) {
    $edit = false;
    $action = "/addNotice";
} else {
    $action = "/addNotice/".$row->id;
}  
@endphp



  



<div class="container" style="padding: 20px">

    

    <form action="{{$action}}" method="post">
        {{ csrf_field() }}
        @if (!empty($edit))
        @method('PUT')
        @endif
        <div class="row">
            <div class="col">
                <label for="date">Notic | मिति</label>
                <input type="text" class="form-control" placeholder="Date" name="date" value="{{ $edit ? $row->date : '' }}">
                @error('date')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col">
                <label for="topic">Topic | 
                    विषय</label>
                <input name="topic"  type="text" class="form-control" placeholder="Topic" value="{{ $edit ? $row->topic : '' }} ">
                @error('topic')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row">
            <label id="detailsLabel" for="details">Topic | 
                विषय</label>
            <div class="col"></div>
            <textarea name="details" class="form-control" rows="10" 
            value="ok" placeholder="Enter Details...">{{ $edit ? $row->details : '' }}</textarea>
            @error('details')
                <span class="text-danger">{{$message}}</span>
                @enderror
        </div>
        <div class="row">
            <div class="col">
                <label for="writer">Writer | लेखक 
                    </label>
                <input name="writer" value="{{ $edit ? $row->writer : '' }}" type="text" class="form-control" placeholder="Writer">
                @error('writer')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col">
                <label for="writer">&nbsp;</label>
                <button type="submit" class="form-control btn btn-primary" value="Submit" type="submit">{{ $edit ? 'edit ' : 'Submit' }}</button>
            </div>
        </div>

</div>


</form>
</div>

@endsection