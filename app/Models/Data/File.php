<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{

    protected static function booted()
    {
        static::deleting(function ($record) {
            if ($record->file_path) {
                Storage::disk('public')->delete($record->file_path);
            }
        });
    }

    protected $fillable = [
        'file_name',
        'category',
        'file_path',
        'file_url'
    ];
}
