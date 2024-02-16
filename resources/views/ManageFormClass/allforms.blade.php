@extends('layouts.master')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-info" id="success-message">
            {{ session('success') }}
        </div>
    @endif
        <br>
            <p class="h3 fw-bold">ALL FORMS IN THE SCHOOL</p>
        @if ($forms->isNotEmpty())
            <table class="table table-sm align-middle table-bordered table-danger border-dark" style="margin-top: 20px">
                <thead>
                    <tr class="table-secondary border-dark">
                        <th scope="col" class="text-center">Num</th>
                        <th scope="col" class="text-center">Forms</th>
                        <th scope="col" class="text-center">List Of Class</th>
                    </tr>
                </thead>
                <tbody>
                @php $list = 1; @endphp
                @foreach ($forms as $form)
                    <tr>
                        <th scope="row">{{ $list }}</th>
                        <td>
                            <a href="{{ route('formdetails', ['id' => $form->id]) }}">Form {{ $form->form_number }}</a>
                        </td>
                        <td>
                        @if ($form->form_class != 0)
                            Number of classes: {{ $form->form_class }}
                            <ol>
                            @foreach ($classes->where('form_id', $form->id) as $class)
                                <a href="">
                                    <li>Class {{ $class->class_name }}</li>
                                </a>
                            @endforeach
                            </ol>
                        @else
                            No class registered
                        @endif
                        </td>
                    </tr>
                    @php $list++; @endphp
                @endforeach
                </tbody>
            </table>
        @else
            <p class="h3 fw-bold">No Form Listed</p>
        @endif
    </div>
@endsection