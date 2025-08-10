<?php

namespace App\Models\Item;

use App\Models\Data\Quiz;
use Illuminate\Database\Eloquent\Model;

class QuizCategory extends Model
{
    protected $fillable = [
        'name',
    ];

    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'category_id');
    }
    
}
