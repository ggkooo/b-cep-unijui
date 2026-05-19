<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['category', 'role', 'name', 'education', 'qualification', 'notes', 'sort_order'])]
class Member extends Model
{
}
