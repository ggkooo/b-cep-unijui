<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['guidance_section_id', 'text', 'sort_order'])]
class GuidanceExample extends Model
{
    public function section(): BelongsTo
    {
        return $this->belongsTo(GuidanceSection::class, 'guidance_section_id');
    }
}
