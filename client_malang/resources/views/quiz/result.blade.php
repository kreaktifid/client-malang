@extends('layouts.app')

@section('css')
<style>
    h1 {
        padding-top: 100px;
        padding-bottom: 10px;
        font-weight: bold;
    }

    h3 {
        padding: 20px;
        color: #ffffff;
        font-weight: bold;
    }

    h3 span{
        padding: 20px;
        background-color: #00CE60;
        border-radius: 20px;
    }

    a.btn.btn-success {
        background-color: #00CE60;
        margin-top: 100px;
    }

</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Hasil Ujian Anda</h1>
            <div class="result">
                <h3><span>50/100</span></h3>
            </div>
            <a href="" class="btn btn-success">Kembali</a>
        </div>
    </div>
</div>
    
@endsection