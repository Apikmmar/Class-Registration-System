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
            <form action="" method="post" enctype="multipart/form-data">
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
            </form>
        </div>
    </div>
@endsection