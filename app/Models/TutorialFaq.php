<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorialFaq extends Model
{
    use HasFactory;

    protected $table = 'tutorial_faqs';

    protected $fillable = [
        'question',
        'answer',
        'sort_order',
    ];
}
