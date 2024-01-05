@extends('adminPanel')
@section('content')

<div class="container" style="padding: 20px">

    

    <form >
        {{ csrf_field() }}

        <div class="row">
            <div class="col">
                <label for="date">Name | नाम</label>
                <input type="text" class="form-control" placeholder="Date" name="name" readonly="readonly" value="{{$row->name}}">
            </div>
            <div class="col">
                <label for="topic">Email | 
                    इमेल</label>
                <input name="email" readonly="readonly"  type="email" class="form-control" placeholder="Topic" value="{{$row->email}} ">
            </div>
        </div>

        <div class="row" style="margin-top: 15px;">
            <div class="col">
                <label for="date">Password | पासवोर्ड</label>
                <input  type="password" class="form-control" placeholder="password" name="password" readonly="readonly">
            </div>
            <div class="col">
                <label for="topic">Retype Password  | पुन लेख्नुहोस</label>
                <input name="retypePassword" readonly="readonly"  type="password" class="form-control" placeholder="retype">
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
                        <input class="form-check-input" type="radio" name="sliderPermission" disabled id="inlineRadio1" value="none"
                        {{($row->sliderPermission == 'none' ? 'checked' : '')}}>
                        <label class="form-check-label" for="inlineRadio1"
                        >none</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sliderPermission" disabled id="inlineRadio2" value="view"
                        {{($row->sliderPermission == 'view' ? 'checked' : '')}}>
                        <label class="form-check-label" for="inlineRadio2"
                        >view</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sliderPermission" disabled id="inlineRadio3" value="edit"
                        {{($row->sliderPermission == 'edit' ? 'checked' : '')}}>
                        <label class="form-check-label" for="inlineRadio3"
                        >edit</label>
                      </div></td>
                    <!-- Add more data cells here if needed -->
                  </tr>

                  <tr>
                    <th scope="row">Notice</th>
                    <td><div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="noticePermission" disabled id="inlineRadio4" value="none"
                        {{($row->noticePermission == 'none' ? 'checked' : '')}}>
                        <label class="form-check-label" for="inlineRanone">none</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="noticePermission" disabled id="inlineRadio5" value="view"
                        {{($row->noticePermission == 'view' ? 'checked' : '')}}>
                        <label class="form-check-label" for="inlineRadio5">view</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="noticePermission" disabled id="inlineRadio6" value="edit"
                        {{($row->noticePermission == 'edit' ? 'checked' : '')}}>
                        <label class="form-check-label" for="inlineRadio6">edit</label>
                      </div></td>
                    <!-- Add more data cells here if needed -->
                  </tr>

                  <tr>
                    <th scope="row">Infrastructure</th>
                    <td><div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="servicePermission" disabled id="inlineRadio7" value="none"
                        {{($row->servicePermission == 'none' ? 'checked' : '')}}>
                        <label class="form-check-label" for="inlineRadio7">none</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="servicePermission" disabled id="inlineRadio8" value="view"
                        {{($row->servicePermission == 'view' ? 'checked' : '')}}>
                        <label class="form-check-label" for="inlineRadio8"
                        >view</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="servicePermission" disabled id="inlineRadio9" value="edit"
                        {{($row->servicePermission == 'edit' ? 'checked' : '')}}>
                        <label class="form-check-label" for="inlineRadio9">edit</label>
                      </div></td>
                    <!-- Add more data cells here if needed -->
                  </tr>

                  <tr>
                    <th scope="row">Teacher</th>
                    <td><div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="teacherPermission" disabled id="inlineRadio10" value="none"
                        {{($row->teacherPermission == 'none' ? 'checked' : '')}}>
                        <label class="form-check-label" for="inlineRadio10">none</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="teacherPermission" disabled id="inlineRadio11" value="view"
                        {{($row->teacherPermission == 'view' ? 'checked' : '')}}>
                        <label class="form-check-label" for="inlineRadio11">view</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="teacherPermission" disabled id="inlineRadio12" value="edit"
                        {{($row->teacherPermission == 'edit' ? 'checked' : '')}}>
                        <label class="form-check-label" for="inlineRadio12">edit</label>
                      </div></td>
                    <!-- Add more data cells here if needed -->
                  </tr>

                  <tr>
                    <th scope="row">Class Schedule</th>
                    <td><div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="schedulePermission" disabled id="inlineRadio13" value="none"
                        {{($row->schedulePermission == 'none' ? 'checked' : '')}}>
                        <label class="form-check-label" for="inlineRadio13">none</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="schedulePermission" disabled id="inlineRadio14" value="view"
                        {{($row->schedulePermission == 'view' ? 'checked' : '')}}>
                        <label class="form-check-label" for="inlineRadio14">view</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="schedulePermission" disabled id="inlineRadio15" value="edit"
                        {{($row->schedulePermission == 'edit' ? 'checked' : '')}}>
                        <label class="form-check-label" for="inlineRadio15">edit</label>
                      </div></td>
                    <!-- Add more data cells here if needed -->
                  </tr>

                  <tr>
                    <th scope="row">Gallery</th>
                    <td><div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="galleryPermission" disabled id="inlineRadio16" value="none"
                        {{($row->galleryPermission == 'none' ? 'checked' : '')}}>
                        <label class="form-check-label" for="inlineRadio16">none</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="galleryPermission" disabled id="inlineRadio17" value="view"
                        {{($row->galleryPermission == 'view' ? 'checked' : '')}}>
                        <label class="form-check-label" for="inlineRadio17">view</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="galleryPermission" disabled id="inlineRadio18" value="edit"
                        {{($row->galleryPermission == 'edit' ? 'checked' : '')}}>
                        <label class="form-check-label" for="inlineRadio18">edit</label>
                      </div></td>
                    <!-- Add more data cells here if needed -->
                  </tr>

                  <tr>
                    <th scope="row">User Management</th>
                    <td><div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="userPermission" disabled id="inlineRadio19" value="none"
                        {{($row->userPermission == 'none' ? 'checked' : '')}}>
                        <label class="form-check-label" for="inlineRadio19">none</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="userPermission" disabled id="inlineRadio20" value="view"
                        {{($row->userPermission == 'view' ? 'checked' : '')}}>
                        <label class="form-check-label" for="inlineRadio20">view</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="userPermission" disabled id="inlineRadio21" value="edit"
                        {{($row->userPermission == 'edit' ? 'checked' : '')}}>
                        <label class="form-check-label" for="inlineRadio21">edit</label>
                      </div></td>
                    <!-- Add more data cells here if needed -->
                  </tr>
                  
                </tbody>
              </table>
        </div>

</div>


</form>
</div>

@endsection