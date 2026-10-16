<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NormativeSection extends Model
{
    use HasFactory;

    protected $table = 'normative_sections';

    protected $fillable = [
        'title',
        'sort_order',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(NormativeItem::class, 'normative_section_id')->orderBy('sort_order');
    }
}
