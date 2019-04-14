<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class QuestionController extends Controller
{

    public function index(Request $request)
    {
        $status = $request->get('status');
        $keyword = $request->get('keyword') ? $request->get('keyword') : '';

        if($status) {
            $questions = \App\Question::where('question', "LIKE", "%$keyword%")->where('status', strtoupper($status))->orderBy('id', 'DESC')->paginate(10);
        } else {
            $questions = \App\Question::where('question', "LIKE", "%$keyword%")->orderBy('id', 'DESC')->paginate(10);
        }

        return view('questions.index', ['questions' => $questions]);
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            "question" => "required|max:1000",
            "image" => "image",
            "option1" => "required|max:191",
            "option2" => "required|max:191",
            "option3" => "max:191",
            "option4" => "max:191",
            "answer" => "required",
        ])->validate();

        $new_question = new \App\Question;

        $new_question->question = $request->get('question');
        $new_question->option1 = $request->get('option1');
        $new_question->option2 = $request->get('option2');
        $new_question->option3 = $request->get('option3');
        $new_question->option4 = $request->get('option4');
        $new_question->answer = $request->get('answer');
        $new_question->status = $request->get('save_action');

        $image = $request->file('image');
        if($image) {
            $image_path = $image->store('question-images', 'public');
            $new_question->image = $image_path;
        }

        $new_question->save();

        if($request->get('save_action') == 'PUBLISH') {
            return redirect()->route('questions.create')->with('status', 'Question successfully saved and published');
        } else {
            return redirect()->route('questions.create')->with('status', 'Question saved as draft');
        }
    }

    public function show($id)
    {
        $question = \App\Question::findOrFail($id);
        return view('questions.show', ['question' => $question]);
    }

    public function edit($id)
    {
        $question = \App\Question::findOrFail($id);
        return view('questions.edit', ['question' => $question]);
    }

    public function update(Request $request, $id)
    {
        $question = \App\Question::findOrFail($id);

        \Validator::make($request->all(), [
            "question" => "required|max:1000",
            "option1" => "required|max:191",
            "option2" => "required|max:191",
            "option3" => "max:191",
            "option4" => "max:191",
            "answer" => "required",
        ])->validate();

        $question->question = $request->get('question');
        $question->option1 = $request->get('option1');
        $question->option2 = $request->get('option2');
        $question->option3 = $request->get('option3');
        $question->option4 = $request->get('option4');
        $question->answer = $request->get('answer');

        $new_image = $request->file('image');

        if($new_image) {
            if($question->image && file_exists(storage_path('app/public/'.$question->image))) {
                \Storage::delete('public/'.$question->image);
            }

            $new_image_path = $new_image->store('question-images', 'public');
            $question->image = $new_image_path;
        }

        $question->status = $request->get('status');
        $question->save();

        return redirect()->route('questions.edit', ['id' => $question->id])->with('status', 'Question successfully updated');
    }

    public function destroy($id)
    {
        $question = \App\Question::findOrFail($id);

        $question->delete();
        return redirect()->route('questions.index')->with('status', 'Question moved to trash');
    }

    public function trash(){
        $questions = \App\Question::onlyTrashed()->paginate(10);
        return view('questions.trash', ['questions' => $questions]);
    }

    public function restore($id) {
        $question = \App\Question::withTrashed()->findOrFail($id);

        if($question->trashed()) {
            $question->restore();
            return redirect()->route('questions.trash')->with('status', 'Question successfully restored');
        } else {
            return redirect()->route('questions.trash')->with('status', 'Question is not in trash');
        }
    }

    public function deletePermanent($id) {
        $question = \App\Question::withTrashed()->findOrFail($id);

        if(!$question->trashed()) {
            return redirect()->route('questions.trash')->with('status', 'Question is not in trash')->with('status_type', 'alert');
        } else {

            $question->forceDelete();
            if($question->image && file_exists(storage_path('app/public/'.$question->image))) {
                \Storage::delete('public/'.$question->image);
            }

            return redirect()->route('questions.trash')->with('status', 'Question permanently deleted!');
        }
    }

}
