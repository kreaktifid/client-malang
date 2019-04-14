@extends('layouts.app')

@section('css')
<style>
    
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

    #username:focus {
        border: 2px solid white;
    }

    #password:focus {
        border: 2px solid white;
    }
</style>
@endsection

@section('content')
<div class="container-fluid cont-login">
    <div class="row justify-content-center">
        <div class="col-md-6 left-side">

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
                            value="{{ old('username') }}" placeholder="Username">

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
            </form>
            <p class="have-account text-center">Belum punya akun? <a href="{{url('/register')}}">Daftar</a></p>
            <div class="the-footer">
                <p class="text-center">2019 Kreaktif. Hak Cipta Dilindungi</p>
            </div>
        </div>
        <div class="col-md-6 right-side d-sm-none d-md-block">
            <div class="bar bar-1"></div>
            <div class="bar bar-2"></div>
            <div class="bar bar-3"></div>
            <div class="bar bar-4"></div>
        </div>
    </div>
</div>
@endsection
