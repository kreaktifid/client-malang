@extends('layouts.global')

@section('title') Detail Question @endsection

@section('content')

<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <label><b>Question</b></label><br>
            {!!html_entity_decode($question->question)!!}
            <br>

            <label><b>Image</b></label><br>
            @if($question->image)
                <img src="{{asset('storage/'.$question->image)}}" width="300px">
            @else
                <small class="text-muted">No image</small>
            @endif
            <br><br>

            <label><b>Option 1</b></label><br>
            {{$question->option1}}
            @if($question->answer=="option1")
                <span style="color:green"><strong><em> (Correct Answer)</em></strong></span>
            @endif
            <br><br>

            <label><b>Option 2</b></label><br>
            {{$question->option2}}
            @if($question->answer=="option2")
                <span style="color:green"><strong><em> (Correct Answer)</em></strong></span>
            @endif
            <br><br>

            <label><b>Option 3</b></label><br>
            {{$question->option3}}
            @if($question->answer=="option3")
                <span style="color:green"><strong><em> (Correct Answer)</em></strong></span>
            @endif
            <br><br>

            <label><b>Option 4</b></label><br>
            {{$question->option4}}
            @if($question->answer=="option4")
                <span style="color:green"><strong><em> (Correct Answer)</em></strong></span>
            @endif
        </div>
    </div>
</div>

@endsection
