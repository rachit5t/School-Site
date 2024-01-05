@php
$permission = Auth::user();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNB  vH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/panel.css')}}">
    
    <title>Admin Panel</title>
</head>
<body>
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 200px; min-height: 100vh;">
        <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
          <span class="fs-4">Admin Panel</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="/panel" class="nav-link"  style="color: white;" aria-current="page">
              <svg class="bi me-2" width="16" height="16"><use xlink:href=""></use></svg>
              Dashboard
            </a>
          </li>
          @if (($permission->sliderPermission == 'edit') or ($permission->sliderPermission == 'view'))
          <li>
            <a href="/slider" class="nav-link text-white">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
              Sliders
            </a>
          </li>
          @endif
          @if (($permission->noticePermission == 'edit') or ($permission->noticePermission == 'view'))
          <li>
            <a href="/noticeManager" class="nav-link text-white">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
              Notice
            </a>
          </li>
          @endif
          @if (($permission->servicePermission == 'edit') or ($permission->servicePermission == 'view'))
          <li>
            <a href="/infrastractureManager" class="nav-link text-white">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
              Intrastracture
            </a>
          </li>
          @endif
          @if (($permission->teacherPermission == 'edit') or ($permission->teacherPermission == 'view'))
          <li>
            <a href="/teacherManager" class="nav-link text-white">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
              Teacher
            </a>
          </li>
          @endif
          @if (($permission->schedulePermission == 'edit') or ($permission->schedulePermission == 'view'))
          <li>
            <a href="/scheduleManager" class="nav-link text-white">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
              Class Schedule
            </a>
          </li>
          @endif
          @if (($permission->galleryPermission == 'edit') or ($permission->galleryPermission == 'view'))
          <li>
            <a href="/imageGallery" class="nav-link text-white">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
              Gallery
            </a>
          </li>
          @endif
          @if (($permission->userPermission == 'edit') or ($permission->userPermission == 'view'))
          <li>
            <a href="/userManager" class="nav-link text-white">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
              User Management
            </a>
          </li>
          @endif
        </ul>
        <hr>
        <div class="dropdown">
        <a class="d-flex align-items-center text-white text-decoration-none" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

          
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div>
      </div>
 
        <div class="mainArea">
          @yield('content')
        </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="{{asset('js/brain.js')}}"></script>
</body>
</html>