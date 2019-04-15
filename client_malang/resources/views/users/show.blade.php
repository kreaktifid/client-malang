@extends('layouts.global')

@section('title') Detail User @endsection

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <b>Name : </b><br>
            {{$user->name}}
            <br><br>

            <b>Username : </b><br>
            {{$user->username}}

            <br><br>
            <b>Role : </b><br>
            {{$user->role}}

        </div>
    </div>
  </div>

@endsection
