<?php

namespace App\Models\Data;

use App\Models\Item\QuizItemType;
use Illuminate\Database\Eloquent\Model;

class QuizItem extends Model
{
    protected $fillable = [
        'quiz_id',
        'question',
        'session',
        'type',
        'a_answer',
        'b_answer',
        'c_answer',
        'd_answer',
        'e_answer',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }

    public function type()
    {
        return $this->belongsTo(QuizItemType::class, 'type', 'name');
    }
}
