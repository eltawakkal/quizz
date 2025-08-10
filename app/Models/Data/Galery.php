<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    protected $fillable = [
        'file_name',
        'file_path'
    ];
}
