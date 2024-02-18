@extends('layouts.master')

@section('content')
    <div class="container">
    @if(session('success'))
        <div class="alert alert-info" id="success-message">
            {{ session('success') }}
        </div>
    @endif
        <div style="margin-top: 30px">
            <p class="h3 fw-bold">EDIT CLASS INFO</p>
            <form action="{{ route('editclass.edit', ['id' => $class->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Class Name:</label>
                        <input type="text" class="form-control" id="inputEmail4" value="{{ $class->class_name }}" name="class_name" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Form:</label>
                        <input type="text" class="form-control" id="inputEmail4" value="{{ $class->form_id }}" readonly>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Class Limit:</label>
                        <input type="number" class="form-control" id="inputPassword4" value="{{ $class->class_limit }}" name="class_limit" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Select Class Teacher:</label>
                        <select class="form-select" aria-label="Select class teacher" name="addrole_teacher" required>
                            <option value="" selected disabled>Select class teacher</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->user_name }}</option>
                        @endforeach
                        </select>
                        
                    </div>
                </div>
                <br>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-info text-light fw-bold">Edit Info</button>
                    @foreach (range(1,5) as $item)
                        &nbsp;
                    @endforeach
                    <button type="reset" class="btn btn-danger fw-bold">Reset</button>
                </div>
            </form>
        </div>
        <br>
        <div>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Number</th>
                    <th scope="col">IC Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                    @php $num = 1; @endphp
                    @foreach ($students as $std)
                    <tr>
                        <th scope="row">{{ $num }}</th>
                        <td>{{ $std->user_ic }}</td>
                        <td>{{ $std->user_name }}</td>
                        <td>
                            <div class="d-flex">
                            @if ($std->class_id == null)
                                <form action="{{ route('editclass.adddropstd', ['id' => $std->id]) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="class_id" value="{{ $class->id }}">
                                    <button class="btn" name="action" value="addstd">
                                        <img src="{{ asset('default-image/addstudent.png') }}" alt="addstd.png" class="operation_icon">
                                    </button>
                                </form>
                            @elseif ($std->class_id == $class->id)
                                <form action="{{ route('editclass.adddropstd', ['id' => $std->id]) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn" name="action" value="dropstd">
                                        <img src="{{ asset('default-image/dropstudent.png') }}" alt="dropstd.png" class="operation_icon">
                                    </button>
                                </form>
                            </div>
                            @else
                            Student of class {{ $std->classroom->class_name }}
                        @endif
                        </td>
                    </tr>
                    @php $num++ @endphp
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection