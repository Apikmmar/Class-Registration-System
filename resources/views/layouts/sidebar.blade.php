<div class="container">
    <div class="d-flex justify-content-center" style="margin-top: 20px">
        <a href="/home">
            <img src="{{ asset('default-image/lecture.png') }}" alt="lectureimg.png" class="lecimg">
        </a>
    </div>

    <div class="d-flex justify-content-center align-items-center" style="margin-top: 13vh;">
        <div class="d-grid gap-2">
            <a href="/home">
                <button class="btn btn-danger fw-bold text-white btn-goto" type="button">Home</button>
            </a>
            <a href="">
                <button class="btn btn-danger fw-bold text-white btn-goto" type="button">View User</button>
            </a>
            <a href="">
                <button class="btn btn-danger fw-bold text-white btn-goto" type="button">Profile</button>
            </a>
        </div>
    </div>
    <div class="fixed-bottom" style="margin-bottom: 70px; margin-left: 43px;">
        <a href="{{ route('logout') }}">
            <button class="btn btn-danger fw-bold text-white btn-goto" type="button">Logout</button>
        </a>
    </div>
</div>
