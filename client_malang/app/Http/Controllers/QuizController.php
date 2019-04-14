<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use App\Question;
use App\User;
use App\Submission;

use Auth;
use Illuminate\Support\Facades\Input;
use DB;

class QuizController extends Controller
{
    public function startQuiz() {
        $durasi = "00:30:00";
        $data["menit"] = date("i", strtotime($durasi));
        $data["detik"] = date("s", strtotime($durasi));


        $user = Auth::user();

        //Create Submission
        $submission = new Submission();
        $submission->user_id = $user->id;
        $submission->status = "PROGRESS";
        $submission->save();

        // dd($submission);

        // Set Quiz question
        $quiz = Quiz::find(1);
        $current_state = null;
        $current_question_id = null;
        $prepared_records = null;

        $question = $quiz->questions;
        $soalArr["questions"] = $question;
        $prepared_records = (object)$soalArr;

        if($current_state) {
            $temp = [];
            foreach($current_state as $key => $val) {
                $temp[(int) $key] = $val;
            }
            $current_state = $temp;
        }

        $data['quiz'] = $quiz;
        $data['active_class'] = 'tryout';
        $data['current_state'] = $current_state;
        $data['current_question_id'] = $current_question_id;
        $data['questions'] = $question->toArray();

        return view('quiz.question', $data);
    }

    public function submitQuiz(Request $request) {
        
        $user = Auth::user();
        $submission = Submission::where('user_id', $user->id)->where('status', 'PROGRESS')->first();
        $submission_id = $submission->id;
        
        $input_data = Input::all();
        $answers = array();
        $user_point = 0;

        // dd($input_data);

        foreach($input_data as $key => $value) {
            if($key == '_token')
                continue;
            // $answers[$key] = $value;
            $question = Question::find($key);
            $answer = $question->answer;
            $point = 0;
            if($value == $answer)
                $point = 5;


            DB::table('question_submission')->insert([
                'question_id'   => $key,
                'answer'        => $value,
                'submission_id' => $submission_id,
                'point'         => $point
            ]);

            $user_point += $point;
        }
        // dd($answers);

        // $submission->questions()->attach(['question_id', 'answer'], $answers);

        $submission->status = "FINISH";
        $submission->save();

        $data['point'] = $user_point;
        

        return view('quiz.result', $data);


    }
}
