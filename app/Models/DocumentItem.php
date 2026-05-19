<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['document_section_id', 'name', 'description', 'file_path', 'original_filename', 'sort_order'])]
class DocumentItem extends Model
{
    public function section(): BelongsTo
    {
        return $this->belongsTo(DocumentSection::class, 'document_section_id');
    }
}
