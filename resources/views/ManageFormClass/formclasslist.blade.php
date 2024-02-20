@extends('layouts.master')

@section('content')
    <div class="container">
        <br>
        <p class="h3 fw-bold">List Of Form And Class</p>
        <br>
        @foreach ($forms as $form)
            <div class="row">
                <div class="col">
                    <p>
                        <button class="btn btn-primary fw-bold" data-bs-toggle="collapse" href="#multiCollapseExample{{ $form->form_number }}" role="button" aria-expanded="false" aria-controls="multiCollapseExample{{ $form->form_number }}">
                            View Form{{ $form->form_number }}
                        </button>
                    </p>
                    <div class="collapse multi-collapse" id="multiCollapseExample{{ $form->form_number }}">
                        <div class="card card-body">
                            <div class="row">
                                <p>Class Of Form {{ $form->form_number }}</p>
                            </div>
                            <div class="row d-flex justify-content-start">
                                <div class="col">
                                @if ($form->classroom->isNotEmpty())
                                @foreach ($form->classroom as $class)
                                    <a href="{{ route('classdetails', ['id' => $class->id]) }}" class="btn btn-secondary">Class {{ $class->class_name }}</a>
                                    @foreach (range(1, 10) as $item) &nbsp; @endforeach
                                @endforeach
                                @else
                                    <p class="fw-bold">No Class Registered Yet</p>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        @endforeach
    </div>
@endsection