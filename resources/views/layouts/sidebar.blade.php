@php
    $currentUser = auth()->user();
    $isAdmin = $currentUser && $currentUser->role_id == 1;
    $isStudent = $currentUser && $currentUser->role_id == 2;
    $isTeacher = $currentUser && $currentUser->role_id == 3;
@endphp

<div class="container">
    <div class="d-flex justify-content-center" style="margin-top: 20px">
        <a href="{{ route('home') }}">
            <img src="{{ asset('default-image/lecture.png') }}" alt="lectureimg.png" class="lecimg">
        </a>
    </div>

    <div class="d-flex justify-content-center align-items-center" style="margin-top: 10vh;">
        <div class="d-grid gap-2">
            <a href="{{ route('home') }}" class="btn btn-danger fw-bold text-white btn-goto">Home</a>
        @if ($isAdmin)
            <a href="{{ route('allforms') }}" class="btn btn-danger fw-bold text-white btn-goto">All Forms</a>
            <a href="{{ route('alluser') }}" class="btn btn-danger fw-bold text-white btn-goto">List Of User</a>
            <a href="{{ route('registeruser') }}" class="btn btn-danger fw-bold text-white btn-goto">Register New User</a>
        @elseif ($isStudent || $isTeacher)
            @if ($isStudent && $currentUser->class_id != null)
                <a href="{{ route('myclass') }}" class="btn btn-danger fw-bold text-white btn-goto">My Class</a>
            @elseif ($isTeacher && $currentUser->class_id != null)
                <a href="" class="btn btn-danger fw-bold text-white btn-goto">List Class</a>
            @endif
            <a href="{{ route('userdirectory') }}" class="btn btn-danger fw-bold text-white btn-goto">User Directory</a>
        @endif
            <br>
            <a href="{{ route('profile') }}" class="btn btn-danger fw-bold text-white btn-goto">Profile</a>
        </div>
    </div>

    <div class="fixed-bottom" style="margin-bottom: 70px; margin-left: 43px;">
        <a href="{{ route('logout') }}" class="btn btn-danger fw-bold text-white btn-goto">Logout</a>
    </div>
</div>
