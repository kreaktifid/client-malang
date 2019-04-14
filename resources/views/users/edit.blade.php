@extends('layouts.global')

@section('title') Edit User @endsection

@section('content')
<div class="col-md-8">

    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

    <form class="bg-white shadow-sm p-3" action="{{route('users.update', ['id'=> $user->id])}}" method="POST">
        @csrf
        <input type="hidden" value="PUT" name="_method">

        <label for="name">Name</label>
        <input class="form-control {{$errors->first('name') ? "is-invalid" : ""}}" placeholder="Full Name" type="text" name="name" id="name" value="{{old('name') ? old('name') : $user->name}}"/>
        <div class="invalid-feedback">
            {{$errors->first('name')}}
        </div>
        <br>

        <label for="username">Username</label>
        <input class="form-control" placeholder="Username" type="text" name="username" id="username" value="{{$user->username}}" disabled/>
        <br>

        <label for="">Status</label>
        <br>
        <input {{$user->status == "ACTIVE" ? "checked" : ""}} value="ACTIVE" type="radio" class="form-control" id="active" name="status"><label for="active">Active</label>
        <input {{$user->status == "INACTIVE" ? "checked" : ""}} value="INACTIVE" type="radio" class="form-control" id="inactive" name="status"><label for="inactive">Inactive</label>
        <br><br>

        <label for="">Role</label>
        <br>
        <input {{$user->role == "ADMIN" ? "checked" : ""}} value="ADMIN" type="radio" class="form-control" id="ADMIN" name="role"><label for="ADMIN">ADMIN</label>
        <input {{$user->role == "USER" ? "checked" : ""}} value="USER" type="radio" class="form-control" id="USER" name="role"><label for="USER">USER</label>
        <div class="invalid-feedback">
            {{$errors->first('role')}}
        </div>
        <br><br>

        <input class="btn btn-primary" type="submit" value="Save"/>
    </form>

</div>
@endsection
