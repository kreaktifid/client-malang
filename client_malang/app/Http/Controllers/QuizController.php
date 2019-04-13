<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use App\Question;

class QuizController extends Controller
{
    public function startQuiz() {
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
}
