@extends('layouts.app')

@section('css')
<style>
    body {
        padding-top: 100px;
        background-color: #f1f1f1; 
    }
    
    h1 {
        padding-bottom: 30px;
    }

    .cont-register form input {
        background-color: transparent;
        color: #090909;
        width: 50%;
        border: solid #090909 1.5px;
        border-radius: 20px;
        margin-right: auto;
        margin-left: auto;
        margin-bottom: 10px;
    }

    .cont-register form input::-moz-placeholder {
        padding-left: 200px;
    }

    form button[type="submit"] {
        border-radius: 20px;
        width: 20%;
        margin-right: auto;
        margin-left: auto;
        display: block;
    }

    .btn-register {
        background-color: #00CE60;
        color: #fff;
        font-weight: bold;
    }

</style> 

@endsection

@section('content')
<div class="container cont-register">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="text-center">
                    <h1>Register</h1>
                </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Username" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Re-Password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
