<?php

namespace App\Models\Data;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    protected $fillable = [
        'quiz_id',
        'user_id',
        'no',
        'type',
        'teaching_type',
        'teaching_type_desc',
        'teaching_type_dimension'
    ];

    function quiz() {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }

    function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
