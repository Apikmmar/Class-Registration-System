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
            @if ($user->class_id)
                @php $class = $user->classroom->class_name; @endphp
            @else
                @php $class = 'No Class Yet'; @endphp
            @endif

            @if ($user->addrole_id)
                @if ($user->role_id == 2 || $user->role_id == 3)
                    @php $class_role = $user->addrole->addrole_name . ' of ' . $class; @endphp                    
                @endif
            @else
                @php $class_role = 'Not Applicable'; @endphp
            @endif
        @if ($user->role_id == 2)
            <div class="d-flex mb-3">
                <div class="col-3 d-flex align-items-center">
                    <label for="exampleFormControlInput1" class="form-label">Class:</label>
                </div>
                <div class="col-8">
                    <input type="input" class="form-control" name="email" value="{{ $class ?? 'No Class Yet' }}" placeholder="Your Class" readonly>
                </div>
            </div>
        @endif
            <div class="d-flex mb-3">
                <div class="col-3 d-flex align-items-center">
                    <label for="exampleFormControlInput2" class="form-label">Class Role:</label>
                </div>
                <div class="col-8">
                    <input type="input" class="form-control" name="class_role" value="{{ $class_role }}" placeholder="Your Class Role" readonly>
                </div>
            </div>
        </div>
    </div>
@endsection