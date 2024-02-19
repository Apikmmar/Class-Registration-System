@extends('layouts.master')

@section('content')
    <div class="container">
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
                    <input type="input" class="form-control" name="name" value="{{ $user->user_name }}" placeholder="Your Name" readonly>
                </div>
            </div>
            <div class="d-flex mb-3">
                <div class="col-3 d-flex align-items-center">
                    <label for="exampleFormControlInput1" class="form-label">Phone Number:</label>
                </div>
                <div class="col-8">
                    <input type="input" class="form-control" name="hp" value="{{ $user->user_hp }}" placeholder="Your Phone Number" readonly>
                </div>
            </div>
            <div class="d-flex mb-3">
                <div class="col-3 d-flex align-items-center">
                    <label for="exampleFormControlInput1" class="form-label">Email:</label>
                </div>
                <div class="col-8">
                    <input type="input" class="form-control" name="email" value="{{ $user->email }}" placeholder="Your Email" readonly>
                </div>
            </div>
            <div class="d-flex mb-3">
                <div class="col-3 d-flex align-items-center">
                    <label for="exampleFormControlInput1" class="form-label">Role:</label>
                </div>
                <div class="col-8">
                    <input type="input" class="form-control" name="email" value="{{ $user->role->role_name }}" placeholder="Your Email" readonly>
                </div>
            </div>
            @php
                $class = $user->class_id ? $user->classroom->class_name : 'No Class Yet';
                $class_role = $user->addrole_id ? $user->addrole->addrole_name : 'No Role';
            @endphp
            <div class="d-flex mb-3">
                <div class="col-3 d-flex align-items-center">
                    <label for="exampleFormControlInput1" class="form-label">Class:</label>
                </div>
                <div class="col-8">
                    <input type="input" class="form-control" name="email" value="{{ $class ?? 'No Class Yet' }}" placeholder="Your Class" readonly>
                </div>
            </div>

            <div class="d-flex mb-3">
                <div class="col-3 d-flex align-items-center">
                    <label for="exampleFormControlInput2" class="form-label">Class Role:</label>
                </div>
                <div class="col-8">
                    <input type="input" class="form-control" name="class_role" value="{{ $class_role ?? 'No Role' }}" placeholder="Your Class Role" readonly>
                </div>
            </div>
        </div>
    </div>
@endsection