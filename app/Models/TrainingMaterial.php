<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'description', 'file_path', 'original_filename', 'sort_order'])]
class TrainingMaterial extends Model
{
}
