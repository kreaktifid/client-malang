@extends("layouts.global")

@section("title") Create New User @endsection

@section("content")
<div class="col-md-8">

    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

    <form class="bg-white shadow-sm p-3" action="{{route('users.store')}}" method="POST">
        @csrf

        <label for="name">Name</label>
        <input value="{{old('name')}}" class="form-control {{$errors->first('name') ? "is-invalid" : ""}}" placeholder="Full Name" type="text" name="name" id="name"/>
        <div class="invalid-feedback">
            {{$errors->first('name')}}
        </div>
        <br>

        <label for="username">Username</label>
        <input value="{{old('username')}}" class="form-control {{$errors->first('username') ? "is-invalid" : ""}}" placeholder="Username" type="text" name="username" id="username"/>
        <div class="invalid-feedback">
            {{$errors->first('username')}}
        </div>
        <br>

        <label for="">Role</label>
        <br>
        <input class="form-control {{$errors->first('role') ? "is-invalid" : ""}}" type="radio" name="role" id="ADMIN" value="ADMIN"><label for="ADMIN">Administrator</label>
        <input class="form-control {{$errors->first('role') ? "is-invalid" : ""}}" type="radio" name="role" id="USER" value="USER"><label for="USER">User</label>
        <div class="invalid-feedback">
            {{$errors->first('role')}}
        </div>
        <br><br>

        <label for="password">Password</label>
        <input class="form-control {{$errors->first('password') ? "is-invalid" : ""}}" placeholder="Password" type="password" name="password" id="password"/>
        <div class="invalid-feedback">
            {{$errors->first('password')}}
        </div>
        <br>

        <label for="password_confirmation">Password Confirmation</label>
        <input class="form-control {{$errors->first('password_confirmation') ? "is-invalid" : ""}}" placeholder="Password Confirmation" type="password" name="password_confirmation" id="password_confirmation"/>
        <div class="invalid-feedback">
            {{$errors->first('password_confirmation')}}
        </div>
        <br>

        <input class="btn btn-primary" type="submit" value="Save"/>
    </form>
</div>
@endsection
