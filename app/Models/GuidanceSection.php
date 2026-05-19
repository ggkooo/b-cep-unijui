<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['title', 'warning', 'important', 'observation', 'sort_order'])]
class GuidanceSection extends Model
{
    public function points(): HasMany
    {
        return $this->hasMany(GuidancePoint::class)->orderBy('sort_order');
    }

    public function examples(): HasMany
    {
        return $this->hasMany(GuidanceExample::class)->orderBy('sort_order');
    }
}
