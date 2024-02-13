<div class="container">
    <div class="d-flex justify-content-center" style="margin-top: 20px">
        <a href="{{ route('home') }}">
            <img src="{{ asset('default-image/lecture.png') }}" alt="lectureimg.png" class="lecimg">
        </a>
    </div>

    <div class="d-flex justify-content-center align-items-center" style="margin-top: 13vh;">
        <div class="d-grid gap-2">
            <a href="{{ route('home') }}">
                <button class="btn btn-danger fw-bold text-white btn-goto" type="button">Home</button>
            </a>
        @if (auth()->check() && auth()->user()->role_id == 1)
            <a href="{{ route('alluser') }}">
                <button class="btn btn-danger fw-bold text-white btn-goto" type="button">List Of User</button>
            </a>
            <a href="{{ route('registeruser') }}">
                <button class="btn btn-danger fw-bold text-white btn-goto" type="button">Register New User</button>
            </a>
        @else
            <a href="">
                <button class="btn btn-danger fw-bold text-white btn-goto" type="button">View User</button>
            </a>
            <a href="{{ route('profile') }}">
                <button class="btn btn-danger fw-bold text-white btn-goto" type="button">Profile</button>
            </a>
        @endif
        </div>
    </div>
    <div class="fixed-bottom" style="margin-bottom: 70px; margin-left: 43px;">
        <a href="{{ route('logout') }}">
            <button class="btn btn-danger fw-bold text-white btn-goto" type="button">Logout</button>
        </a>
    </div>
</div>
