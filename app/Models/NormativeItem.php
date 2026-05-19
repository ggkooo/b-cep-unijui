<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['normative_section_id', 'title', 'file_path', 'original_filename', 'sort_order'])]
class NormativeItem extends Model
{
    public function section(): BelongsTo
    {
        return $this->belongsTo(NormativeSection::class, 'normative_section_id');
    }
}
