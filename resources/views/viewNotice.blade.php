@extends('adminPanel')
@section('content')




  



<div class="container" style="padding: 20px">

    

    <form action="" method="">
        {{ csrf_field() }}
        <div class="row">
            <div class="col">
                <label for="date">Notic | मिति</label>
                <input type="text" class="form-control" placeholder="Date" name="date" value="{{$row->date}}" readonly="readonly">
            </div>
            <div class="col">
                <label for="topic">Topic | 
                    विषय</label>
                <input name="topic"  type="text" class="form-control" placeholder="Topic" value="{{$row->topic}}" readonly="readonly">
            </div>
        </div>

        <div class="row">
            <label id="detailsLabel" for="details">Topic | 
                विषय</label>
            <div class="col"></div>
            <textarea name="details" class="form-control" rows="10" 
            value="ok" 
            readonly="readonly" placeholder="Enter Details...">{{$row->details}}</textarea>
        </div>
        <div class="row">
            <div class="col">
                <label for="writer">Writer | लेखक 
                    </label>
                <input name="writer" value="{{$row->writer}}" type="text" class="form-control" placeholder="Writer" readonly="readonly">
            </div>
        </div>

</div>


</form>
</div>

@endsection