<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['title', 'sort_order'])]
class DocumentSection extends Model
{
    public function items(): HasMany
    {
        return $this->hasMany(DocumentItem::class)->orderBy('sort_order');
    }
}
