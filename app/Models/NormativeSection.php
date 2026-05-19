<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'sort_order'])]
class NormativeSection extends Model
{
    public function items(): HasMany
    {
        return $this->hasMany(NormativeItem::class)->orderBy('sort_order');
    }
}
