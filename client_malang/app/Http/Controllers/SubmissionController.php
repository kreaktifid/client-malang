<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubmissionController extends Controller
{

    public function index(Request $request)
    {
        $status = $request->get('status');
        $username = $request->get('username');

        $submissions = \App\Submission::with('user')
        ->with('questions')
        ->whereHas('user', function($query) use ($username) {
            $query->where('username', 'LIKE', "%$username%");
        })
        ->where('status', 'LIKE', "%$status%")
        ->orderBy('id', 'DESC')
        ->paginate(10);
        return view('submissions.index', ['submissions' => $submissions]);
    }

    public function show($id)
    {
        $submission = \App\Submission::findOrFail($id);
        return view('submissions.show', ['submission' => $submission]);
    }

}
