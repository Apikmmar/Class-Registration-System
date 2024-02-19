@extends('layouts.master')

@section('content')

    <div class="container">
    @if(session('success'))
        <div class="alert alert-info" id="success-message">
            {{ session('success') }}
        </div>
    @endif
        <br>
        <div class="container">
            <h3 class="fw-bold">EDIT USER DATA</h3>
        </div>
        <form action="{{ route('edituser.edit', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container d-flex">
                <div class="col" style="margin-top: 30px">
                    <div>
                        @if ($user->user_photopath)
                            <img src="{{ asset('storage/' . $user->user_photopath) }}" alt="profile.png" class="profile-photo">
                        @else
                            <img src="{{ asset('default-image/profile.png') }}" alt="profile.png" class="profile-photo">
                        @endif
                    </div>
                    <br>
                    <div class="d-flex mb-3">
                        <div class="col-3 d-flex align-items-center">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Name:</label>
                        </div>
                        <div class="col-8">
                            <input type="input" class="form-control" name="name" value="{{ $user->user_name }}" placeholder="Your Name" required>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="col-3 d-flex align-items-center">
                            <label for="exampleFormControlInput1" class="form-label">Identity Card Number:</label>
                        </div>
                        <div class="col-8">
                            <input type="input" class="form-control" name="ic" value="{{ $user->user_ic }}" placeholder="Your IC" required>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="col-3 d-flex align-items-center">
                            <label for="exampleFormControlInput1" class="form-label">Age:</label>
                        </div>
                        <div class="col-8">
                            <input type="input" class="form-control" name="age" value="{{ $user->user_age }}" placeholder="Your Age" required>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="col-3 d-flex align-items-center">
                            <label for="exampleFormControlInput1" class="form-label">Address:</label>
                        </div>
                        <div class="col-8">
                            <input type="input" class="form-control" name="address" value="{{ $user->user_address }}" placeholder="Your Address" required>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="col-3 d-flex align-items-center">
                            <label for="exampleFormControlInput1" class="form-label">Phone Number:</label>
                        </div>
                        <div class="col-8">
                            <input type="input" class="form-control" name="hp" value="{{ $user->user_hp }}" placeholder="Your Phone Number" required>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="col-3 d-flex align-items-center">
                            <label for="exampleFormControlInput1" class="form-label">Email:</label>
                        </div>
                        <div class="col-8">
                            <input type="input" class="form-control" name="email" value="{{ $user->email }}" placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="col-3 d-flex align-items-center">
                            <label for="exampleFormControlInput1" class="form-label">Update Password:</label>
                        </div>
                        <div class="col-8">
                            <input type="password" class="form-control" name="password" value="" placeholder="Set New Password">
                        </div>
                    </div>
                    <div class="form-check d-flex justify-content-end" style="margin-right: 90px; margin-top: -15px;">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">&nbsp;
                        <label class="form-check-label" for="flexCheckChecked">
                            Set Password As IC Number
                        </label>
                    </div>
                    <br>
                    <div class="d-flex mb-3">
                        <div class="col-3 d-flex align-items-center">
                            <label for="exampleFormControlInput1" class="form-label">Role:</label>
                        </div>
                        <div class="col-8">
                            <select name="role_id" class="form-control" required>
                                <option disabled>Select Role of User</option>
                                <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>Administrator</option>
                                <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>Student</option>
                                <option value="3" {{ $user->role_id == 3 ? 'selected' : '' }}>Teacher</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-center">
                        <div>
                            <button type="submit" class="btn btn-info fw-bold text-white">Update</button>
                            @foreach (range(1, 5) as $index)
                            &nbsp;
                            @endforeach
                            <button type="reset" class="btn btn-danger fw-bold">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection