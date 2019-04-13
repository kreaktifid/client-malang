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
    .btn.btn-prev {
        margin-top: 20px;
        float: left;
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
                        <?php
                            $q_num = 1;
                        ?>
                        @for ($i = 0; $i <count($questions); $i++) 
                            <?php
                                $default_class = 'not-visited';
                                // if(isset($cState) && $cState) {
                                //     if(array_key_exists($question[$i]->id, $cState))
                                //         $default_class = 'answered';
                                // }
                            ?> 
                            <li class="pal pal-el {{$default_class}}" onclick="showSpecificQuestion({{$i}});">
                                <span>{{$q_num}}</span>
                            </li>
                            <?php 
                                $q_num++;
                            ?>
                        @endfor

                    </ul>
                    <button class="btn btn-warning btn-prev" onclick="prevClick()">Sebelumnya <i class="fa fa-chevron-left"></i></button>
                    <button class="btn btn-success btn-next" onclick="nextClick()">Selanjutnya <i class="fa fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <h1>Soal</h1>
            <form action="">
                @for ($j = 0; $j<count($questions); $j++)

                <div id="question-list">
                    <div class="card" class="question-div" name="question[{{$questions[$j]['id']}}]">
                        <div class="card-header">
                            {{$j+1}}
                        </div>
                        <div class="card-body">
                            <input type="radio" name="{{$questions[$j]['id']}}" id=""> {{$questions[$j]['option1']}} <br />
                            <input type="radio" name="{{$questions[$j]['id']}}" id=""> {{$questions[$j]['option2']}} <br />
                            <input type="radio" name="{{$questions[$j]['id']}}" id=""> {{$questions[$j]['option3']}} <br />
                            <input type="radio" name="{{$questions[$j]['id']}}" id=""> {{$questions[$j]['option4']}} <br />
                        </div>
                    </div>
                </div>
                @endfor
                <button type="submit" class="btn btn-primary btn-submit">Submit</button>
            </form>


        </div>
    </div>
</div>

<script>
    var VISIBLE_ELEMENT = $("#question-list .question-div:visible");
    var ANSWERED        = ' answered';
    var NOT_ANSWERED    = ' not-answered';
    var ANSWER_MARKED   = ' marked';
    var NOT_VISITED     = ' not-visited';        

    $(document).ready(function() {
        $("#question-list .card").slice(0,10).show();
        $("li.pal.pal-el span").slice(0,10).css("background-color", "green");
        

        $("#question-list .card").slice(10,20).hide();
        $("li.pal.pal-el span").slice(11,20).css("background-color", "white");

        $("button.btn-prev").hide();
        $("button.btn-submit").hide();

        console.log("Hello");
    });

    function nextClick() {
        $("#question-list .card").slice(0,10).hide();
        $("li.pal.pal-el span").slice(0,10).css("background-color", "white");

        $("#question-list .card").slice(10,20).show();
        $("li.pal.pal-el span").slice(10,20).css("background-color", "green");
    
        $("button.btn-prev").show();
        $("button.btn-next").hide();
        $("button.btn-submit").show();
    }

    function prevClick() {
        $("#question-list .card").slice(0,10).show();
        $("li.pal.pal-el span").slice(0,10).css("background-color", "green");
        

        $("#question-list .card").slice(10,20).hide();
        $("li.pal.pal-el span").slice(10,20).css("background-color", "white");

        $("button.btn-prev").hide();
        $("button.btn-next").show();
        $("button.btn-submit").hide();
    }

    function showSpecificQuestion(index) {
        $(VISIBLE_ELEMENT).hide();
        $("#question-list .question-div:eq("+index+")").fadeIn();

        return false;
    }

</script>
@endsection
