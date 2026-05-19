<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'url', 'thumbnail_path', 'sort_order'])]
class TutorialVideo extends Model
{
}
