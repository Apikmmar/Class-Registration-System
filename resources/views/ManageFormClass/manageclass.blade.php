@extends('layouts.master')

@section('content')
    <div class="container">
        <br>
        <p class="h3 fw-bold">Information of Class {{ $class->class_name }}</p>
        <br>
        <form action="" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Class Name:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputPassword" value="{{ $class->class_name }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Class Teacher:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputPassword" value="{{ $teacher->user_name }}" readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Class Representative:</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name='rep'>
                        <option disabled>Open this select menu</option>
                        @foreach ($students as $std)
                            <option value="{{ $std->user_id }}" @if($std->addrole_id == 2) selected @endif>
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
                        <option disabled>Open this select menu</option>
                        @foreach ($students as $std)
                            <option value="{{ $std->user_id }}" @if($std->addrole_id == 3) selected @endif>
                                {{ $std->user_ic }} - {{ $std->user_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Class Secretary:</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name='sec'>
                        <option disabled>Open this select menu</option>
                        @foreach ($students as $std)
                            <option value="{{ $std->user_id }}" @if($std->addrole_id == 4) selected @endif>
                                {{ $std->user_ic }} - {{ $std->user_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Class Treasurer:</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name='tre'>
                        <option disabled>Open this select menu</option>
                        @foreach ($students as $std)
                            <option value="{{ $std->user_id }}" @if($std->addrole_id == 5) selected @endif>
                                {{ $std->user_ic }} - {{ $std->user_name }}
                            </option>
                        @endforeach
                    </select>
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
                    </tr>
                    @php $list++; @endphp
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection