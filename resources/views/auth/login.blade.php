@extends('layouts.app')
@section('title','login')
@section('content')


    <form action="{{route ('login')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" value="{{old ('email')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary">login</button>
        <span>or have no account | </span>
        <a href="{{route ('register')}}">sign up</a>
    </form>

@endsection
