@extends('layouts.global')

@section('title') Question List @endsection

@section('content')

<div class="row">
    <div class="col-md-12">

        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <form action="{{route('questions.index')}}">
                    <div class="input-group">
                        <input name="keyword" type="text" value="{{Request::get('keyword')}}" class="form-control" placeholder="Filter by question">
                        <div class="input-group-append">
                            <input type="submit" value="Filter" class="btn"  style="background-color:#bd1544;color:#fff;">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <ul class="nav nav-pills card-header-pills">
                    <li class="nav-item"><a class="nav-link {{Request::get('status') == NULL && Request::path() == 'questions' ? 'active' : ''}}" href="{{route('questions.index')}}">All</a></li>
                    <li class="nav-item"><a class="nav-link {{Request::get('status') == 'publish' ? 'active' : ''}}" href="{{route('questions.index', ['status' => 'publish'])}}">Publish</a></li>
                    <li class="nav-item"><a class="nav-link {{Request::get('status') == 'draft' ? 'active' : ''}}" href="{{route('questions.index', ['status' => 'draft'])}}">Draft</a></li>
                    <li class="nav-item"><a class="nav-link {{Request::path() == 'questions/trash' ? 'active' : ''}}" href="{{route('questions.trash')}}">Trash</a></li>
                </ul>
            </div>
        </div>

        <hr class="my-3">

        <div class="row mb-3">
            <div class="col-md-12 text-right">
                <a href="{{route('questions.create')}}" class="btn btn-success">Create question</a>
            </div>
        </div>

        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered tabel-stripped">
                    <thead>
                        <tr>
                            <th><b>No</b></th>
                            <th><b>Question</b></th>
                            <th><b>Image</b></th>
                            <th><b>Answer</b></th>
                            <th><b>Status</b></th>
                            <th><b>Action</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=0; ?>
                        @foreach($questions as $question)
                            <?php $no++; ?>
                            <tr>
                                <td>{{$no}}</td>
                                <td>{!!Str::limit(html_entity_decode($question->question), 100)!!}</td>
                                <td>
                                    @if($question->image)
                                        <img src="{{asset('storage/'.$question->image)}}" width="96px"/>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if($question->answer=="option1")
                                        {{Str::limit($question->option1, 50)}}
                                    @elseif($question->answer=="option2")
                                        {{Str::limit($question->option2, 50)}}
                                    @elseif($question->answer=="option3")
                                        {{Str::limit($question->option3, 50)}}
                                    @elseif($question->answer=="option4")
                                        {{Str::limit($question->option4, 50)}}
                                    @endif
                                </td>
                                <td>
                                    @if($question->status == "DRAFT")
                                        <span class="badge bg-dark text-white">{{$question->status}}</span>
                                    @else
                                        <span class="badge badge-success">{{$question->status}}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('questions.edit', ['id' => $question->id])}}" class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{route('questions.show', ['id' => $question->id])}}" class="btn btn-primary btn-sm">Detail</a>
                                    <form method="POST" class="d-inline" onsubmit="return confirm('Move question to trash?')" action="{{route('questions.destroy', ['id' => $question->id])}}">
                                        @csrf
                                        <input type="hidden" value="DELETE" name="_method">

                                        <input type="submit" value="Trash" class="btn btn-danger btn-sm">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="10">{{$questions->appends(Request::all())->links()}}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
