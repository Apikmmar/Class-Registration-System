@extends('layouts.master')

@section('content')
    <div class="container">
    @if(session('success'))
        <div class="alert alert-info" id="success-message">
            {{ session('success') }}
        </div>
    @endif
        <div style="margin-top: 30px">
            <p class="h3 fw-bold">EDIT CLASS DATA</p>
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
                </div>
                <br>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-info text-light fw-bold">Edit Limit</button>
                    @foreach (range(1,5) as $item)
                        &nbsp;
                    @endforeach
                    <button type="reset" class="btn btn-danger fw-bold">Reset</button>
                </div>
            </form>
        </div>
    </div>
@endsection