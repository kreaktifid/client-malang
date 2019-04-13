@extends('layouts.global')

@section('title') Detail Submission @endsection

@section('content')

<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <label><b>User</b></label><br>
            {{$submission->user->name}}
            <br><br>

            <label><b>Attempt</b></label><br>
            {{$submission->created_at}}
            <br><br>

            <label><b>Finish</b></label><br>
            {{$submission->updated_at}}
            <br><br>

            <label><b>Tasks ({{$submission->totalPoint}} point) </b></label><br>
            <ol>
                @foreach($submission->questions as $question)
                    <li>{!!html_entity_decode($question->question)!!}
                        <em>Answer :</em>
                        @if($question->pivot->answer=="option1")
                            (A) {{$question->option1}}
                        @elseif($question->pivot->answer=="option2")
                            (B) {{$question->option2}}
                        @elseif($question->pivot->answer=="option3")
                            (C) {{$question->option3}}
                        @elseif($question->pivot->answer=="option4")
                            (D) {{$question->option4}}
                        @endif
                        <br>
                        <em>Correct Answer :</em>
                        @if($question->answer=="option1")
                            (A) {{$question->option1}}
                        @elseif($question->answer=="option2")
                            (B) {{$question->option2}}
                        @elseif($question->answer=="option3")
                            (C) {{$question->option3}}
                        @elseif($question->answer=="option4")
                            (D) {{$question->option4}}
                        @endif
                        <br>

                        @if($question->pivot->answer==$question->answer)
                            <span style="color:green"><strong>({{$question->pivot->point}} point)</strong></span>
                        @else
                            <span style="color:red"><strong>({{$question->pivot->point}} point)</strong></span>
                        @endif
                @endforeach
            </ol>
            <br><br>
        </div>
    </div>
</div>

@endsection
