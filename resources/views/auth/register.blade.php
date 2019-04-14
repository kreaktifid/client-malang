@extends('layouts.app')


@section('content')
<style>
    #name:focus {
        border: 2px solid white;
    }

    #username:focus {
        border: 2px solid #fff;
    }

    #password:focus {
        border: 2px solid #fff;
    }

    #password_confirmation:focus {
        border: 2px solid #fff;
    }
</style>
<div class="container-fluid cont-register">
    <div class="row justify-content-center">
        <div class="col-md-6 left-side">

            <h1 class="text-center">Register</h1>
            <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="Username" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Re-Password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success text-center">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
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

    </div>
</div>
@endsection
