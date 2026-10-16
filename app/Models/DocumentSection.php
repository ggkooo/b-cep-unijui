<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentSection extends Model
{
    use HasFactory;

    protected $table = 'document_sections';

    protected $fillable = [
        'title',
        'sort_order',
    ];

    public function items()
    {
        return $this->hasMany(DocumentItem::class, 'document_section_id')->orderBy('sort_order', 'asc');
    }
}
