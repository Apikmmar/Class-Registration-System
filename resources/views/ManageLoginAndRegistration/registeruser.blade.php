@extends('layouts.master')

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success" id="success-message">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger" id="success-message">
                {{ session('error') }}
            </div>
        @endif
        <div class="reg-design">
            <div class="">
                <h3 class="fw-bold">REGISTER NEW USER</h3>
            </div>
            <div class="">
                <form action="{{ route('registeruser.post') }}" method="POST">
                    @csrf
                    <div style="width: 500px">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">User Name:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Lee Kuan Yew" name="user_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">IC Number:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="1111111111" name="user_ic" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">User Age:</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="12" name="user_age" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Address:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="No 11, Kedah, Malaysia" name="user_address" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Phone Number:</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="01234567891" name="user_hp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address:</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="password" name="password" required>
                        </div>
                        <div class="form-check d-flex justify-content-end" style="margin-top: -15px;">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">&nbsp;
                            <label class="form-check-label" for="flexCheckChecked">
                                Set Password As IC Number
                            </label>
                        </div>
                        <div>
                            <label for="exampleFormControlInput1" class="form-label">Role:</label>
                            <select name="role_id" class="form-control" required>
                                <option selected>Select User</option>
                                <option value="1">Administrator</option>
                                <option value="2">Student</option>
                                <option value="3">Teacher</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div>
                        <button type="submit" class="btn btn-primary fw-bold">Add New User</button>
                        @foreach (range(1, 5) as $item)
                            &nbsp;
                        @endforeach
                        <button type="reset" class="btn btn-danger fw-bold">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection