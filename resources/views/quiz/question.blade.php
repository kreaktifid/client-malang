@extends('layouts.app')

@section('css')
<style>
    .card {
        margin-bottom: 20px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
        border-radius: 20px;
    }

    .card .card-header {
        background-color: #ffffff;
        /* border: transparent; */
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        margin-bottom: 0px;
    }

    .card .card-body input[type="radio"] {
        margin-bottom: 10px;
    }

    .circle {
        width: 30px;
        height: 30px;
        border-radius: 100%;
        border: solid #000000;
    }

    ul.question-pal {
        margin: 0;
        padding: 0;
        list-style: none;
        /* margin: 0 -4px; */
        max-height: 400px;
        overflow-y: scroll;
        overflow: auto;

    }

    ul.question-pal li {
        display: inline-block;
        margin: 0 3px 3px;
        /* box-shadow: 0px 0px 2px 0.00px rgba(0, 0, 0, 0.2); */

    }

    ul.question-pal li span {
        float: left;
        width: 20px;
        height: 20px;
        line-height: 20px;
        text-align: center;
        background-color: #ffffff;
        color: #000000;
        border: solid 1px #000000;
        font-size: 12px;
        border-radius: 100%;
    }

    .btn.btn-next {
        margin-top: 20px;
        float: right;
    }

</style>
@endsection

@section('navbar')
    @extends('layouts.navbar')
@endsection

@section('content')
<div class="container cont-question">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <p>Petunjuk: Tekan <i>icon</i> untuk mendengarkan cerita soal</p>

            <div class="card">
                <div class="card-header">
                    <p>Urutan Soal</p>
                </div>
                <div class="card-body">
                    <ul class="question-pal" id="pal-list">
                        @for ($i = 0; $i < count($questions); $i++) <?php
                                $default_class = 'not-visited';
                                if(isset($cState) && $cState) {
                                    if(array_key_exists($question[$i]->id, $cState))
                                        $default_class = 'answered';
                                }
                            ?> <li class="pal pal-el {{$default_class}}" onclick="showSpecificQuestion({{$i}});">
                            <span>{{$i+1}}</span>
                            </li>
                            @endfor

                    </ul>
                    <button class="btn btn-success btn-next">Selanjutnya <i class="fa fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <h1>Soal</h1>
            <form action="">
                @foreach ($questions as $q)

                <div class="card" id="question-list">
                    <div class="card-header">
                        {{$q->id}}
                    </div>
                    <div class="card-body question-div">
                        <input type="radio" name="{{$q->id}}" id=""> {{$q->option1}} <br />
                        <input type="radio" name="{{$q->id}}" id=""> {{$q->option2}} <br />
                        <input type="radio" name="{{$q->id}}" id=""> {{$q->option3}} <br />
                        <input type="radio" name="{{$q->id}}" id=""> {{$q->option4}} <br />
                    </div>
                </div>
                @endforeach
            </form>


        </div>
    </div>
</div>

<script>
    var VISIBLE_ELEMENT = "#question-list .question-div:visible";

    function showSpecificQuestion(index) {
        $(VISIBLE_ELEMENT).hide();
        $("question-list .question-dic:eq(" + index + ")").fadeIn();

        return false;
    }

</script>
@endsection
