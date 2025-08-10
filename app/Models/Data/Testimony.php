<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    protected $fillable = [
        'name',
        'message',
        'image',
        'position',
    ];
}
