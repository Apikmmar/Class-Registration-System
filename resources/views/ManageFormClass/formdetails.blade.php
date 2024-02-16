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
                    <button type="submit" class="btn btn-info fw-bold text-white">Update</button>
                @foreach (range(1, 5) as $index)
                    &nbsp;
                @endforeach
                    <button type="reset" class="btn btn-danger fw-bold">Reset Limit</button>
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
                        <th scope="col" class="text-center">Current Student Number</th>
                        <th scope="col" class="text-center">Student Limit</th>
                        <th scope="col" class="text-center">Class Operation</th>
                    </tr>
                </thead>
                <tbody>
                @php $list = 1; @endphp
                @foreach ($form->classroom as $class)
                    <tr class="text-center">
                        <th scope="row">{{ $list }}</th>
                        <td>Class {{ $class->class_name }}</td>
                        <td>{{ $numofstd }} students</td>
                        <td>{{ $class->class_limit }} students</td>
                        <td class="d-flex justify-content-center">
                            <form action="" method="get">
                                @csrf
                                <button class="btn">
                                    <img src="{{ asset('default-image/edit.png') }}" class="operation_icon" alt="edit_user.png">
                                </button>
                            </form>
                            @foreach (range(1,5) as $item)
                                &nbsp;
                            @endforeach
                            <form action="" method="post" onsubmit="return confirm('Are You Sure You Want To Delete This Class?');">
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
    </div>
@endsection