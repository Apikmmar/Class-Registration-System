@extends('layouts.master')

@section('content')

    <div class="container">
        <br>
        <p class="h3 fw-bold">Class {{ $class->class_name }}</p>
        <div class="row">            
            <div class="d-flex align-items-center">
                @if ($teacher->user_photopath)
                    <img src="{{ asset('storage/' . $teacher->user_photopath) }}" alt="profile.png" class="profile-photo">
                @else
                    <img src="{{ asset('default-image/profile.png') }}" alt="profile.png" class="profile-photo">
                @endif
                <div class="h5 fw-bold ms-3 d-flex">
                    <label for="">Class Teacher: </label>
                    &nbsp;
                    <p> {{ $teacher->user_name }} </p>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
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
