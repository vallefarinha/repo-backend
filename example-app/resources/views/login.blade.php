@extends('layout')
@section('title', 'login')
@section('css')
@vite(['resources/css/test.css'])
@endsection

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
    <form action="{{route('loginPost')}}" method="POST" class="form-signin">
        @csrf
        <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72"
            height="72">
        <h1 class="title h3 mb-3 font-weight-normal">Please sign in</h1>

        <label for="inputEmail" class="d-flex">Email address</label>
        <input type="email" class="form-control" placeholder="Email address" name="email" required autofocus>

        <label for="inputPassword" class="d-flex">Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>

    @endsection
