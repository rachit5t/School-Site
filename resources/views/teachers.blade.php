@extends("layout")
@php
if (empty($filter)) {
    $filter = false;
}
@endphp    
@section("content")
<div class="container">
    <div class="row">
        <form action="/teacher/all" method="get">
            <button type="submit" class="btn {{$filter? ($filter == 'all' ? 'btn-danger' : 'btn-primary') : 'btn-primary'}} mx-2 my-2">All teachers</button> 
        
        </form>
        @foreach ($row2 as $key=>$d)
        @php
        $action = "/teacher/".$d->position;
        @endphp
        <form action="{{$action}}" method="get"><button type="submit" class="btn {{$filter? ($filter == $d->position ? 'btn-danger' : 'btn-primary') : 'btn-primary'}} mx-2 my-2" >{{$d->position}}</button></form>
        
        @endforeach
    </div>
    
    <div class="row">
        <div class="staffContainer" style="display: flex; flex-wrap: wrap;">
            @foreach ( $row as $key=>$d)
            <div class="staff" style="min-width: 210px;">
                <div class="row">
                    @php
                $path = "images/".$d->image;
                @endphp
                    <img src="{{asset($path)}}" alt="..." class="staffPhoto">
                </div>
                <div class="row">
                    <pre class="staffName">Name : {{$d->name}}</pre> 

                </div>
                <div class="row">
                    <pre class="staffPosition">Position : {{$d->position}}</pre> 
                </div>
                
                <div class="row">
                    <a href="{{$d->facebook}}"><i class="fa-brands fa-facebook fa-2x logo"></i></a>
                    <form action="mailto:{{$d->email}}" method="GET" >
                        <button type="submit"  style="border: 0px; background: none;"><i class="fa-solid fa-envelope fa-2x logo mail"></i></button>
                    </form>

                    <style>
                        .mail.mail:clicked{
                            border: 0px;
                        }

                        
                    </style>
                    

                    <a href="{{$d->twitter}}"><i class="fa-brands fa-square-twitter fa-2x logo"></i></a>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
  
</div>
@endsection