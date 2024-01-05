@extends('adminPanel')
@section('content')

<div class="container" style="padding: 20px">
    <form action="" method="" enctype="">
    {{ csrf_field() }}
        <div class="row">
            <div class="col">
                <label for="date">Name | नाम</label>
                <input readonly="readonly" type="text" class="form-control" placeholder="Date" name="name" value="{{$row->name}}">
            </div>
            <div class="col">
                <label for="topic">Photo | फोटो</label>
                
                @php
                $path = "images/".$row->photo;
                @endphp
                <img src="{{asset($path)}}" alt="" style="height: 300px;">
            </div>
        </div>

</div>


</form>
</div>

@endsection