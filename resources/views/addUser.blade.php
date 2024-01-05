@extends('adminPanel')
@section('content')
@php
if (empty($edit)) {
    $edit = false;
    $action = "/addUser";
} else {
    $action = "/addUser/".$row->id;
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
                <label for="date">Name | नाम</label>
                <input type="text" class="form-control" placeholder="Date" name="name" value="{{ $edit ? $row->name : '' }}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col">
                <label for="topic">Email | 
                    इमेल</label>
                <input name="email"  type="email" class="form-control" placeholder="Topic" value="{{ $edit ? $row->email : '' }} ">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row" style="margin-top: 15px;">
            <div class="col">
                <label for="date">Password | पासवोर्ड</label>
                <input  type="password" class="form-control" placeholder="password" name="password">
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col">
                <label for="topic">Retype Password  | पुन लेख्नुहोस</label>
                <input name="retypePassword"  type="password" class="form-control" placeholder="retype">
            </div>
        </div>

        <div class="row">
            <table class="table" style="margin: 15px;">
                <thead>
                  <tr>
                    <th scope="col">Pages</th>
                    <th scope="col">Permission</th>
                    <!-- Add more columns here if needed -->
                  </tr>
                </thead>
                <tbody style="font-weight: 100;">
                  <tr>
                    <th scope="row">Sliders</th>
                    <td><div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sliderPermission" id="inlineRadio1" value="none"
                        {{$edit?($row->sliderPermission == 'none' ? 'checked' : ''): '' }}>
                        <label class="form-check-label" for="inlineRadio1"
                        >none</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sliderPermission" id="inlineRadio2" value="view"
                        {{$edit?($row->sliderPermission == 'view' ? 'checked' : ''): '' }}>
                        <label class="form-check-label" for="inlineRadio2"
                        >view</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sliderPermission" id="inlineRadio3" value="edit"
                        {{$edit?($row->sliderPermission == 'edit' ? 'checked' : ''): '' }}>
                        <label class="form-check-label" for="inlineRadio3"
                        >edit</label>
                        
                      </div>
                      @error('sliderPermission')
                <span class="text-danger">{{$message}}</span>
                @enderror</td>
                    <!-- Add more data cells here if needed -->
                  </tr>

                  <tr>
                    <th scope="row">Notice</th>
                    <td><div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="noticePermission" id="inlineRadio4" value="none"
                        {{$edit?($row->noticePermission == 'none' ? 'checked' : ''): '' }}>
                        <label class="form-check-label" for="inlineRanone">none</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="noticePermission" id="inlineRadio5" value="view"
                        {{$edit?($row->noticePermission == 'view' ? 'checked' : ''): '' }}>
                        <label class="form-check-label" for="inlineRadio5">view</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="noticePermission" id="inlineRadio6" value="edit"
                        {{$edit?($row->noticePermission == 'edit' ? 'checked' : ''): '' }}>
                        <label class="form-check-label" for="inlineRadio6">edit</label>
                      </div>
                      @error('noticePermission')
                <span class="text-danger">{{$message}}</span>
                @enderror</td>
                    <!-- Add more data cells here if needed -->
                  </tr>

                  <tr>
                    <th scope="row">Infrastructure</th>
                    <td><div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="servicePermission" id="inlineRadio7" value="none"
                        {{$edit?($row->servicePermission == 'none' ? 'checked' : ''): '' }}>
                        <label class="form-check-label" for="inlineRadio7">none</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="servicePermission" id="inlineRadio8" value="view"
                        {{$edit?($row->servicePermission == 'view' ? 'checked' : ''): '' }}>
                        <label class="form-check-label" for="inlineRadio8"
                        >view</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="servicePermission" id="inlineRadio9" value="edit"
                        {{$edit?($row->servicePermission == 'edit' ? 'checked' : ''): '' }}>
                        <label class="form-check-label" for="inlineRadio9">edit</label>
                      </div>
                      @error('servicePermission')
                <span class="text-danger">{{$message}}</span>
                @enderror</td>
                    <!-- Add more data cells here if needed -->
                  </tr>

                  <tr>
                    <th scope="row">Teacher</th>
                    <td><div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="teacherPermission" id="inlineRadio10" value="none"
                        {{$edit?($row->teacherPermission == 'none' ? 'checked' : ''): '' }}>
                        <label class="form-check-label" for="inlineRadio10">none</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="teacherPermission" id="inlineRadio11" value="view"
                        {{$edit?($row->teacherPermission == 'view' ? 'checked' : ''): '' }}>
                        <label class="form-check-label" for="inlineRadio11">view</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="teacherPermission" id="inlineRadio12" value="edit"
                        {{$edit?($row->teacherPermission == 'edit' ? 'checked' : ''): '' }}>
                        <label class="form-check-label" for="inlineRadio12">edit</label>
                      </div>
                      @error('teacherPermission')
                <span class="text-danger">{{$message}}</span>
                @enderror</td>
                    <!-- Add more data cells here if needed -->
                  </tr>

                  <tr>
                    <th scope="row">Class Schedule</th>
                    <td><div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="schedulePermission" id="inlineRadio13" value="none"
                        {{$edit?($row->schedulePermission == 'none' ? 'checked' : ''): '' }}>
                        <label class="form-check-label" for="inlineRadio13">none</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="schedulePermission" id="inlineRadio14" value="view"
                        {{$edit?($row->schedulePermission == 'view' ? 'checked' : ''): '' }}>
                        <label class="form-check-label" for="inlineRadio14">view</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="schedulePermission" id="inlineRadio15" value="edit"
                        {{$edit?($row->schedulePermission == 'edit' ? 'checked' : ''): '' }}>
                        <label class="form-check-label" for="inlineRadio15">edit</label>
                      </div>
                      @error('schedulePermission')
                <span class="text-danger">{{$message}}</span>
                @enderror</td>
                    <!-- Add more data cells here if needed -->
                  </tr>

                  <tr>
                    <th scope="row">Gallery</th>
                    <td><div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="galleryPermission" id="inlineRadio16" value="none"
                        {{$edit?($row->galleryPermission == 'none' ? 'checked' : ''): '' }}>
                        <label class="form-check-label" for="inlineRadio16">none</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="galleryPermission" id="inlineRadio17" value="view"
                        {{$edit?($row->galleryPermission == 'view' ? 'checked' : ''): '' }}>
                        <label class="form-check-label" for="inlineRadio17">view</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="galleryPermission" id="inlineRadio18" value="edit"
                        {{$edit?($row->galleryPermission == 'edit' ? 'checked' : ''): '' }}>
                        <label class="form-check-label" for="inlineRadio18">edit</label>
                      </div>
                      @error('galleryPermission')
                <span class="text-danger">{{$message}}</span>
                @enderror</td>
                    <!-- Add more data cells here if needed -->
                  </tr>

                  <tr>
                    <th scope="row">User Management</th>
                    <td><div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="userPermission" id="inlineRadio19" value="none"
                        {{$edit?($row->userPermission == 'none' ? 'checked' : ''): '' }}>
                        <label class="form-check-label" for="inlineRadio19">none</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="userPermission" id="inlineRadio20" value="view"
                        {{$edit?($row->userPermission == 'view' ? 'checked' : ''): '' }}>
                        <label class="form-check-label" for="inlineRadio20">view</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="userPermission" id="inlineRadio21" value="edit"
                        {{$edit?($row->userPermission == 'edit' ? 'checked' : ''): '' }}>
                        <label class="form-check-label" for="inlineRadio21">edit</label>
                      </div>
                      @error('userPermission')
                <span class="text-danger">{{$message}}</span>
                @enderror</td>
                    <!-- Add more data cells here if needed -->
                  </tr>
                  
                </tbody>
              </table>
        </div>
        <div class="row">
            <div class="col">
                
                <button type="submit" class="form-control btn btn-primary" value="Submit" type="submit">{{ $edit ? 'edit ' : 'Submit' }}</button>
            </div>
        </div>

</div>


</form>
</div>

@endsection