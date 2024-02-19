@extends('layouts.master')

@section('content')
    <div class="container">
        <br>
        <p class="h3 fw-bold">Class {{ $user->classroom->class_name }} Info</p>
        <br>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label"><b>Class Teacher:</b></label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=" {{ $classteacher->user_name }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label"><b>Class Name:</b></label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=" {{ $user->classroom->class_name }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label"><b>Total Student:</b></label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=" {{ $user->classroom->class_limit }} students">
            </div>
        </div>
        <br>
        <table class="table table-sm table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Student Role</th>
                </tr>
            </thead>
            <tbody>
            @php $stdlist = 1; @endphp
            @foreach ($classmate as $std)
                <tr>
                    <th scope="row">{{ $stdlist }}</th>
                    <td>{{ $std->user_name }}</td>
                    <td> Class
                    @if ($std->addrole != null)
                        {{ $std->addrole->addrole_name }} <a href="#" class="link-secondary fst-italic" style="font-size: 13px" data-bs-toggle="modal" data-bs-target="#exampleModal">Role desc...</a>
                    @else
                        Member
                    @endif
                    </td>
                </tr>
                @php $stdlist++; @endphp 
            @endforeach
            </tbody>
        </table>
    </div>        

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @foreach ($allrole as $role)
                    <b>{{ $role->addrole_name }}</b> -> {{ $role->addrole_desc }}
                    <br>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
@endsection