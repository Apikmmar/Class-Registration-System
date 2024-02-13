@extends('layouts.master')

@section('content')
    <div class="container">
    @if(session('success'))
        <div class="alert alert-info" id="success-message">
            {{ session('success') }}
        </div>
    @endif
        <table class="table table-bordered table-danger border-dark" style="margin-top: 30px">
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
                    <td>{{ $user->user_name }}</td>
                    <td>{{ $user->user_ic }}</td>
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
    </div>
@endsection