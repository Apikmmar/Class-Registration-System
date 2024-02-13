@extends('layouts.master')

@section('content')

    <div class="container">
        <form action="">
            @csrf
            @method('PUT')
            <div class="container d-flex">
                <div class="col" style="margin-top: 30px">
                    <div>
                        <img src="{{ asset('') }}" alt="{{ asset('default-image/profile.png') }}" class="">
                    </div>
                    <br>
                    <div class="d-flex mb-3">
                        <div class="col-3 d-flex align-items-center">
                            <label for="exampleFormControlInput1" class="form-label">Identity Card Number:</label>
                        </div>
                        <div class="col-8">
                            <input type="input" class="form-control" name="ic" value="" placeholder="Your IC">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection