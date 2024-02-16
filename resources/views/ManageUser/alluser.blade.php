@extends('layouts.master')

@section('content')
    <div class="container">
    @if(session('success'))
        <div class="alert alert-info" id="success-message">
            {{ session('success') }}
        </div>
    @endif
        <br>
            <p class="h3 fw-bold">LIST OF USER</p>
            <div class="container d-flex justify-content-end">
                <div>
                    <form class="row g-3" action="{{ route('alluser.filter') }}" method="get">
                        @csrf
                        <div class="input-group mb-3">
                            <select class="form-select" aria-label="Default select example" name="role_id">
                                <option selected disabled>Filter by role</option>
                                <option value="1">Administrator</option>
                                <option value="2">Student</option>
                                <option value="3">Teacher</option>
                            </select>
                            <button class="btn btn-outline-primary" type="submit"  id="button-addon2">Filter</button>
                          </div>
                    </form>
                </div>
            @foreach (range(1,5) as $item)
                &nbsp;
            @endforeach
                <div>
                    <form class="row g-3" action="{{ route('alluser.search') }}" method="get">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Name" name="searchname" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-primary" type="submit"  id="button-addon2">Search</button>
                          </div>
                    </form>
                </div>
            @foreach (range(1,5) as $item)
                &nbsp;
            @endforeach
                <div>
                    <form class="row g-3" action="{{ route('alluser') }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-secondary fw-bold text-white">CLEAR FILTER</button>
                    </form>
                </div>
            </div>
        @if ($users->isNotEmpty())
            <table class="table table-sm align-middle table-bordered table-danger border-dark" style="margin-top: 20px">
                <thead>
                    <tr class="table-secondary border-dark">
                        <th scope="col" class="text-center">Num</th>
                        <th scope="col" class="text-center">IC Number</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Role</th>
                        <th scope="col" class="text-center">Manage Operation</th>
                    </tr>
                </thead>
                <tbody>
                @php $list = 1; @endphp
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $list }}</th>
                        <td>{{ $user->user_ic }}</td>
                        <td>{{ $user->user_name }}</td>
                        <td>{{ $user->role->role_name }}</td>
                        <td class="d-flex justify-content-center">
                            <form action="{{ route('edituser', ['id' => $user->id]) }}" method="get">
                                @csrf
                                <button class="btn">
                                    <img src="{{ asset('default-image/edit.png') }}" class="operation_icon" alt="edit_user.png">
                                </button>
                            </form>
                            @foreach (range(1,5) as $item)
                                &nbsp;
                            @endforeach
                            <form action="{{ route('user.destroy', ['id' => $user->id]) }}" method="post" onsubmit="return confirm('Are You Sure You Want To Delete This User?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn">
                                    <img src="{{ asset('default-image/delete.png') }}" class="operation_icon" alt="delete_user.png">
                                </button>
                            </form>
                        </td>
                    </tr>
                    @php $list++; @endphp
                @endforeach
                </tbody>
            </table>
        @else
            <p class="h3 fw-bold">No User Listed</p>
        @endif
    </div>
@endsection