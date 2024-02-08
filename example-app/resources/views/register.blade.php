@extends('layout')
@section('title', 'register')
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
        <div class="alert alert-danger">{{session('error')}}</div>
        @endif


        @if(session()->has('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
    </div>
    <form class="form-signin" action="{{route('registerPost')}}" method="POST">
        @csrf
        <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72"
            height="72">
        <h1 class="h3 mb-3 font-weight-normal">Register Here</h1>

        <label class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Full Name" name="name" required autofocus>

        <label for="inputEmail" class="form-label">Email address</label>
        <input type="email" class="form-control" placeholder="Email address" name="email" required autofocus>

        <label for="inputPassword" class="form-label">Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password" required autofocus>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>

    </form>

    @endsection