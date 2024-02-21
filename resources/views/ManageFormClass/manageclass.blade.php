@extends('layouts.master')

@section('content')
    <div class="container">
    @if(session('success'))
        <div class="alert alert-info" id="success-message">
            {{ session('success') }}
        </div>
    @elseif (session('fail'))
        <div class="alert alert-danger" id="success-message">
            {{ session('fail') }}
        </div>
    @endif
        <br>
        <p class="h3 fw-bold">Information of Class {{ $class->class_name }}</p>
        <br>
        <form action="{{ route('manageclass.edit') }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Class Name:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputPassword" value="{{ $class->class_name }}" name="class_name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Class Teacher:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputPassword" value="{{ $teacher->user_name }}" readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Representative:</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name='rep'>
                        <option selected value="" disabled>Select a Class Representative</option>
                        @foreach ($students as $std)
                            <option value="{{ $std->id }}" @if($std->addrole_id == 2) selected @endif>
                                {{ $std->user_ic }} - {{ $std->user_name }}
                            </option>
                        @endforeach
                    </select>   
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Vice Representative:</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name='vicerep'>
                        <option selected disabled>Select a Class Vice Representative</option>
                        @foreach ($students as $std)
                            <option value="{{ $std->id }}" @if($std->addrole_id == 3) selected @endif>
                                {{ $std->user_ic }} - {{ $std->user_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Secretary:</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name='sec'>
                        <option selected disabled>Select a Class Secretary</option>
                        @foreach ($students as $std)
                            <option value="{{ $std->id }}" @if($std->addrole_id == 4) selected @endif>
                                {{ $std->user_ic }} - {{ $std->user_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Treasurer:</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name='tre'>
                        <option selected disabled>Select a Class Treasurer</option>
                        @foreach ($students as $std)
                            <option value="{{ $std->id }}" @if($std->addrole_id == 5) selected @endif>
                                {{ $std->user_ic }} - {{ $std->user_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="row justify-content-center align-items-center">
                <div class="col-auto">
                    <button class="btn btn-info fw-bold text-light" type="submit">Update</button>
                </div>
                <div class="col-auto">
                    <button class="btn btn-danger fw-bold text-light" type="reset">Reset</button>
                </div>
            </div>            
        </form>
        <br>
        <div class="container">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">IC Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Class Role</th>
                    <th scope="col">Drop Role</th>
                  </tr>
                </thead>
                <tbody>
                @php $list = 1; @endphp
                @foreach ($students as $std)
                    <tr>
                        <th scope="row">{{ $list }}</th>
                        <td>{{ $std->user_ic }}</td>
                        <td>{{ $std->user_name }}</td>
                        <td>{{ $std->user_hp }}</td>
                        <td>{{ optional($std->addrole)->addrole_name ?: 'Class Member' }}</td>
                        <td>
                        @if ($std->addrole_id != null)
                            <a href="">
                                <img src="{{ asset('default-image/delete.png') }}" class="operation_icon" alt="delete_user.png" style="margin-left: 20px;">
                            </a>
                        @else
                        <i> Not Applicable </i>
                        @endif
                        </td>
                    </tr>
                    @php $list++; @endphp
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection