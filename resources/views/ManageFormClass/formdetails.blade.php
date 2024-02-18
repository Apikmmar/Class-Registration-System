@extends('layouts.master')

@section('content')
    <div class="container">
    @if(session('success'))
        <div class="alert alert-info" id="success-message">
            {{ session('success') }}
        </div>
    @endif
        <div>
            <p class="h3 fw-bold" style="margin-top: 30px">FORM DETAILS</p>
            <form action="{{ route('formdetails.edit', ['id' => $form->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Form:</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control" value="Form {{ $form->form_number }}">
                    </div>
                </div>
                <br>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Form Classes:</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" value="{{ $form->form_class }}" name="form_class" required>
                    </div>
                </div>
                <br>
                <div>
                    <button type="submit" class="btn btn-info fw-bold text-white">Update Form</button>
                @foreach (range(1, 5) as $index)
                    &nbsp;
                @endforeach
                    <button type="reset" class="btn btn-danger fw-bold">Reset</button>
                </div>
            </form>
        </div>
        <br>
        <div>
            <p class="h3 fw-bold">ADD NEW CLASS</p>
            <form class="row g-3" action="{{ route('editclass.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Class Name:</label>
                    <input type="text" class="form-control" id="inputEmail4" name="class_name" required>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Class Limit:</label>
                    <input type="number" class="form-control" id="inputPassword4" name="class_limit" required>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Form:</label>
                    <input type="text" class="form-control" id="inputPassword4" value="{{ $form->form_number }}" name="form_id" readonly>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary fw-bold">Add Class</button>
                    @foreach (range(1,5) as $item)
                        &nbsp;
                    @endforeach
                    <button type="reset" class="btn btn-danger fw-bold">Reset</button>
                </div>
              </form>
        </div>
        <br>
        <div>
        @if ($form->classroom->isNotEmpty())
            <p class="h3 fw-bold" style="margin-top: 30px">LIST OF CLASS</p>
            <table class="table table-sm align-middle table-bordered table-danger border-dark" style="margin-top: 20px">
                <thead>
                    <tr class="table-secondary border-dark">
                        <th scope="col" class="text-center">Num</th>
                        <th scope="col" class="text-center">Class Name</th>
                        <th scope="col" class="text-center">Total Student</th>
                        <th scope="col" class="text-center">Class Operation</th>
                    </tr>
                </thead>
                <tbody>
                @php $list = 1; @endphp
                @foreach ($classes->where('form_id', $form->id) as $class)
                    <tr class="text-center">
                        <th scope="row">{{ $list }}</th>
                        <td>Class {{ $class->class_name }}</td>
                        <td>{{ $class->class_limit }} students</td>
                        <td class="d-flex justify-content-center">
                            <form action="{{ route('editclass', ['id' => $class->id]) }}" method="get">
                                @csrf
                                <button class="btn">
                                    <img src="{{ asset('default-image/edit.png') }}" class="operation_icon" alt="edit_user.png">
                                </button>
                            </form>
                            @foreach (range(1,5) as $item)
                                &nbsp;
                            @endforeach
                            <form action="{{ route('class.delete', ['id' => $class->id]) }}" method="post" onsubmit="return confirm('Are You Sure You Want To Delete This Class?');">
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
            <p class="h3 fw-bold">No Class Registered Yet</p>
        @endif
        </div>
        <br>
        <div>
        @if ($form->students->isNotEmpty())
            <p class="h3 fw-bold" style="margin-top: 30px">LIST OF STUDENT IN FORM {{ $form->form_number }}</p>
            <table class="table table-sm align-middle table-bordered table-danger border-dark" style="margin-top: 20px">
                <thead>
                    <tr class="table-secondary border-dark">
                        <th scope="col" class="text-center">Num</th>
                        <th scope="col" class="text-center">Student Name</th>
                        <th scope="col" class="text-center">Student IC</th>
                        <th scope="col" class="text-center">Student Class</th>
                    </tr>
                </thead>
                <tbody>
                @php $list = 1; @endphp
                @foreach ($form->students as $student)
                    <tr class="text-center">
                        <th scope="row">{{ $list }}</th>
                        <td>{{ $student->user_name }}</td>
                        <td>{{ $student->user_ic }}</td>
                        <td>{{ $student->classroom->class_name }}</td>
                    </tr>
                    @php $list++; @endphp
                @endforeach
                </tbody>
            </table>
        @else
            <p class="h3 fw-bold">No Student</p>
        @endif
        </div>
    </div>
@endsection