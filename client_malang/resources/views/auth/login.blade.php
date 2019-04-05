@extends('layouts.app')

@section('css')
<style>
    body {
        padding-top: 100px;
        background-color: #f1f1f1;
    }

    h1 {
        color: #090909;
        margin-bottom: 30px;
    }

    form input[type="text"],
    form input[type="password"] {
        color: #ffffff;
        background-color: #2e2e2e;
        border-radius: 20px;
        width: 50%;
        margin-right: auto;
        margin-left: auto;
    }

    form input[type="text"]:focus ,
    form input[type="password"]:focus  {
        color: #ffffff;
        background-color: #2e2e2e;
        border: none;
    }

    .img-profile {
        margin-bottom: 30px;
    }

    .img-profile .circle {
        width: 100px;
        height: 100px;
        background-color: transparent;
        border: solid #090909 3px;
        border-radius: 100%;
        display: inline-block;
    }

    form button[type="submit"] {
        border-radius: 20px;
        width: 20%;
        margin-right: auto;
        margin-left: auto;
        display: block;
    }

    .btn-login {
        background-color: #00CE60;
        color: #fff;
    }

    p.have-account a {
        text-decoration: none;
        color: #090909;
        font-weight: bold;
    }

    p.have-account a:hover {
        color: #00CE60;
    }

    #footer {}

</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <h1 class="text-center">Login</h1>
            <div class="img-profile text-center">
                <span class="circle"></span>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="username" type="text"
                            class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username"
                            value="{{ old('username') }}" placeholder="Username" required autofocus>

                        @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="password" type="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                            placeholder="Password" required>

                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-login text-center">
                            Login
                        </button>
                    </div>
                </div>
        </div>
        </form>
        <p class="have-account">Belum punya akun? <a href="{{url('/register')}}">Daftar</a></p>

        <div id="">
            <p>2019 Kreaktif, Hak Cipta Terlindungi</p>
        </div>
    </div>
</div>
@endsection
