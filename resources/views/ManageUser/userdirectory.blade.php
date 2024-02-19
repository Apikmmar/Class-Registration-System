@extends('layouts.master')

@section('content')
    <div class="container">
    @if(session('success'))
        <div class="alert alert-info" id="success-message">
            {{ session('success') }}
        </div>
    @endif
        <br>
        <div class="container d-flex justify-content-end">
            <div>
                <form class="row g-3" action="{{ route('userdirectory.search') }}" method="get">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Name" name="searchname" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-primary" type="submit"  id="button-addon2">Search</button>
                        </div>
                </form>
            </div>
        </div>
    @if ($users->isNotEmpty())
        <div style="margin-top: 30px">
            <p class="h3 fw-bold">List Of User</p>
                <table class="table table-sm align-middle table-bordered table-danger border-dark" style="margin-top: 20px">
                    <thead>
                        <tr class="table-secondary border-dark">
                            <th scope="col" class="text-center">Num</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $list = 1; @endphp
                    @foreach ($users as $user)
                        <tr class="text-center">
                            <th scope="row">{{ $list }}</th>
                            <td>
                                <a href="{{ route('userprofile', ['id' => $user->id]) }}">{{ $user->user_name }}</a>
                            </td>
                            <td>{{ $user->role->role_name }}</td>
                        </tr>
                        @php $list++; @endphp
                    @endforeach
                    </tbody>
                </table>
            @else
                <p class="h3 fw-bold">Data Not Found</p>
            @endif
        </div>
    </div>
@endsection