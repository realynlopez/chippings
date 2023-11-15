@extends('layout')
@section('title','login')
@section('content')
<div class="container">
    <div class="mt-5">
        @if($errors->any())
            <div class="col-12">
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(session()->has('success')) {{-- Note the correct spelling 'success' instead of 'sucess' --}}
            <div class="alert alert-danger">{{ session('success') }}</div>
        @endif
    </div>

    <form action="{{route('login.post')}}" method="POST"class="ms-auto me-auto mt-auto" style="width: 500px">
        @csrf
        <div class="mb-3">
            <label class="form-label">Email Adress</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="col-md-6">
                    <label for="job" class="form-label">Choose User</label>
                    <select class="form-select" name="job" id="job">
                        <option disabled selected>Option</option>
                        <option value="Pastry Chef">Admin</option>
                        <option value="Catering Manager">Cashier</option>
                        <option value="Maintenance Worker">Kitchen</option>
                        <option value="Parking lot attendant">Rider</option>
                        <option value="Reservations Agent">Customer</option>
                    </select>
                </div>
            <br>
            <div class="mb-3 ">
                <input class="btn btn-primary btn-lg" type="submit" value="Submit">
            </div>
            <br>

        
    </form>
</div>
@endsection