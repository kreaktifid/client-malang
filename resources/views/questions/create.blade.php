@extends('layouts.global')

@section('title') Create Question @endsection

@section('content')

<div class="row">
    <div class="col-md-8">
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif

        <form action="{{route('questions.store')}}" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 bg-white">
            @csrf

            <label for="question">Question</label><br>
            <textarea name="question" id="question" class="form-control {{$errors->first('question') ? "is-invalid" : ""}}" placeholder="Question">{{old('question')}}</textarea>
            <div class="invalid-feedback">
                {{$errors->first('question')}}
            </div>
            <br>

            <label for="image">Image</label><br>
            <input type="file" class="form-control {{$errors->first('image') ? "is-invalid" : ""}}" name="image">
            <div class="invalid-feedback">
                {{$errors->first('image')}}
            </div>
            <br>

            <label for="option1">Option 1</label><br>
            <input type="text" value="{{old('option1')}}" class="form-control {{$errors->first('option1') ? "is-invalid" : ""}}" name="option1" placeholder="Option 1">
            <div class="invalid-feedback">
                {{$errors->first('option1')}}
            </div>
            <input value="option1" type="radio" class="form-control" id="option1" name="answer"><label for="option1">TRUE ANSWER</label>
            <br>

            <label for="option2">Option 2</label><br>
            <input type="text" value="{{old('option2')}}" class="form-control {{$errors->first('option2') ? "is-invalid" : ""}}" name="option2" placeholder="Option 2">
            <div class="invalid-feedback">
                {{$errors->first('option2')}}
            </div>
            <input value="option2" type="radio" class="form-control" id="option2" name="answer"><label for="option2">TRUE ANSWER</label>
            <br>

            <label for="option3">Option 3</label><br>
            <input type="text" value="{{old('option3')}}" class="form-control {{$errors->first('option3') ? "is-invalid" : ""}}" name="option3" placeholder="Option 3">
            <div class="invalid-feedback">
                {{$errors->first('option3')}}
            </div>
            <input value="option3" type="radio" class="form-control" id="option3" name="answer"><label for="option3">TRUE ANSWER</label>
            <br>

            <label for="option4">Option 4</label><br>
            <input type="text" value="{{old('option4')}}" class="form-control {{$errors->first('option4') ? "is-invalid" : ""}}" name="option4" placeholder="Option 4">
            <div class="invalid-feedback">
                {{$errors->first('option4')}}
            </div>
            <input value="option4" type="radio" class="form-control" id="option4" name="answer"><label for="option4">TRUE ANSWER</label>
            <br><br>

            <button class="btn btn-primary" name="save_action" value="PUBLISH">Publish</button>
            <button class="btn btn-secondary" name="save_action" value="DRAFT">Save as draft</button>
        </form>
    </div>
</div>

@endsection

@section('js')

<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
    var question = document.getElementById("question");
      CKEDITOR.replace(question, {
      language:'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
</script>

@endsection
