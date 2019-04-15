<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'question', 'image', 'option1', 'option2', 'option3', 'option4', 'answer', 'status',
    ];

    public function submissions() {
        return $this->belongsToMany('\App\Submission');
    }

    public function quiz() {
        return $this->belongsTo('App\Quiz', 'id_quiz');
    }
}
