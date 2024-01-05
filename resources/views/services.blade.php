@extends("layout")

@section("content")
<div class="serviceContainer">
    <h1>हाम्रा सेवाहरु</h1>

    @foreach ( $row as $key=>$d)
            @if ($d->active == "true")
            @php
                $path = "images/".$d->photo;
                
            @endphp
    <div class="serviceList">
        <div class="indivisualService">
            <div class="titled">
                <h1>{{$d->topic}}</h1 >
                <img src="{{asset($path)}}" alt="">
            </div>
            <p> {{$d->details}}</p>
        </div>
    </div>
    @endif
    @endforeach
</div>
@endsection