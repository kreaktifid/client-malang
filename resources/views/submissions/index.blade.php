@extends('layouts.global')

@section('title') Submissions List @endsection

@section('content')

<form action="{{route('submissions.index')}}">
    <div class="row">
        <div class="col-md-5">
            <input value="{{Request::get('username')}}" name="username" type="text" class="form-control" placeholder="Search by username">
        </div>
        <div class="col-md-2">
            <select name="status" class="form-control" id="status">
                <option value="">ANY</option>
                <option {{Request::get('status') == "PROGRESS" ? "selected" : ""}} value="PROGRESS">PROGRESS</option>
                <option {{Request::get('status') == "FINISH" ? "selected" : ""}} value="FINISH">FINISH</option>
            </select>
        </div>
        <div class="col-md-2">
            <input type="submit" value="Filter" class="btn" style="background-color:#bd1544;color:#fff;">
        </div>
    </div>
</form>

<hr class="my-3">

<div class="row">
    <div class="table-responsive">
        <table class="table table-stripped table-bordered">
            <thead>
                <tr>
                    <th><b>No</b></th>
                    <th><b>Status</b></th>
                    <th><b>User</b></th>
                    <th><b>Total Point</b></th>
                    <th><b>Attempt</b></th>
                    <th><b>Finish</b></th>
                    <th><b>Action</b></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=0; ?>
                @foreach($submissions as $submission)
                <?php $no++; ?>
                    <tr>
                        <td>{{$no}}</td>
                        <td>
                            @if($submission->status == "PROGRESS")
                                <span class="badge bg-warning text-light">{{$submission->status}}</span>
                            @elseif($submission->status == "FINISH")
                                <span class="badge bg-success text-light">{{$submission->status}}</span>
                            @endif
                        </td>
                        <td>
                            {{$submission->user->name}} <br>
                            <small>{{$submission->user->username}}</small>
                        </td>
                        <td>
                            @if($submission->totalPoint)
                                {{$submission->totalPoint}} point
                            @else
                                0 point
                            @endif
                        </td>
                        <td>{{$submission->created_at}}</td>
                        <td>{{$submission->updated_at}}</td>
                        <td>
                            <a href="{{route('submissions.show', ['id' => $submission->id])}}" class="btn btn-info btn-sm">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="10">{{$submissions->appends(Request::all())->links()}}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection
