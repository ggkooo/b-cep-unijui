<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NormativeItem extends Model
{
    use HasFactory;

    protected $table = 'normative_items';

    protected $fillable = [
        'normative_section_id',
        'title',
        'file_path',
        'original_filename',
        'sort_order',
    ];

    protected $appends = ['file_url'];

    public function getFileUrlAttribute(): ?string
    {
        return $this->file_path ? asset('storage/' . $this->file_path) : null;
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(NormativeSection::class, 'normative_section_id');
    }
}
