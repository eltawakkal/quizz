<?php

namespace App\Models\Data;

use App\Models\Item\QuizCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Quiz extends Model
{
    protected $casts = [
        'faq' => 'array',
    ];

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'what_you_get',
        'faq',
        'price',
        'promo_price',
        'image',
    ];

    public function getLimitedDescription()
    {
        return Str::limit(strip_tags($this->description), 50, '...');
    }

    public function items()
    {
        return $this->hasMany(QuizItem::class, 'quiz_id');
    }

    public function category()
    {
        return $this->belongsTo(QuizCategory::class);
    }
}
