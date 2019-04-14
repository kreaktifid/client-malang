<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = [
        'user_id',
    ];

    public function user() {
        return $this->belongsTo('\App\User');
    }

    public function questions() {
        return $this->belongsToMany('\App\Question')->withPivot('answer', 'point');
    }

    public function getTotalPointAttribute() {
        $total_point = 0;

        foreach($this->questions as $question) {
            $total_point += $question->pivot->point;
        }

        return $total_point;
    }
}
