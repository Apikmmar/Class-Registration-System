@extends('layouts.master')

@section('content')

    <div class="container">
    @if(session('success'))
        <div class="alert alert-info" id="success-message">
            {{ session('success') }}
        </div>
    @endif
        <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container d-flex">
                <div class="col" style="margin-top: 30px">
                    <div class="row">
                        <div class="col-3">
                            <div>
                            @if ($user->user_photopath)
                                <img src="{{ asset('storage/' . $user->user_photopath) }}" alt="profile.png" class="profile-photo">
                            @else
                                <img src="{{ asset('default-image/profile.png') }}" alt="profile.png" class="profile-photo">
                            @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3" style="margin-top: 70px">
                                <label for="formFile" class="form-label">Upload Image:</label>
                                <input class="form-control" type="file" value="{{ $user->user_photopath }}" name="photo" id="formFile" style="width: 670px">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="d-flex mb-3">
                        <div class="col-3 d-flex align-items-center">
                            <label for="exampleFormControlInput1" class="form-label">Name:</label>
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
                            <input type="input" class="form-control" name="email" value="{{ $user->email }}" placeholder="Your Email required">
                        </div>
                    </div>
                @if ($user->class_id != null)
                    @if ($user->addrole_id != null)
                        @php
                            $role = $user->addrole->addrole_name . ' of ' . $user->classroom->class_name; 
                        @endphp
                    @else
                        @php
                            $role = $user->role->role_name . ' of ' . $user->classroom->class_name; 
                        @endphp
                    @endif
                @else
                    @php
                        $role = $user->role->role_name
                    @endphp
                @endif
                @php
                    $class = $user->class_id ? $user->classroom->class_name : 'No Class Yet';
                @endphp
                    <div class="d-flex mb-3">
                        <div class="col-3 d-flex align-items-center">
                            <label for="exampleFormControlInput1" class="form-label">Role:</label>
                        </div>
                        <div class="col-8">
                            <input type="input" class="form-control" name="password" value="{{ $role }}" placeholder="Your Password" readonly>
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