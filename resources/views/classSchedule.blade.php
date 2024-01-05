@extends("layout")

@section("content")
<div class="scheduleContainer">
@foreach ($ClassList as $key=>$data)
<div class="classContainer">
        <h1>{{$data->name}}</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">आइतबार</th>
                    <th scope="col">सोमबार</th>
                    <th scope="col">मंगलबर</th>
                    <th scope="col">बुधबार</th>
                    <th scope="col">बिहिबार</th>
                    <th scope="col">सुक्रबार</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($RowList as $keyy=>$dataa)
                    @if ($dataa->class_id == $data->class_id)
                    <tr>
                    <th scope="row">{{$dataa->time}}</th>
                    <td>{{$dataa->sun}}</td>
                    <td>{{$dataa->mon}}</td>
                    <td>{{$dataa->tue}}</td>
                    <td>{{$dataa->wne}}</td>
                    <td>{{$dataa->thu}}</td>
                    <td>{{$dataa->fri}}</td>
                </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endforeach
</div>
@endsection