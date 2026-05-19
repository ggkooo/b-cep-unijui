<?php

namespace Database\Seeders;

use App\Models\DocumentItem;
use App\Models\DocumentSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $section = DocumentSection::query()->updateOrCreate(['id' => 1], [
            'title' => 'Termos de Consentimento e Assentimento',
            'sort_order' => 1,
        ]);

        DocumentItem::query()->updateOrCreate(['id' => 1], [
            'document_section_id' => $section->id,
            'name' => 'TCLE - Termo de Consentimento Livre e Esclarecido',
            'description' => 'Modelo de termo para participantes de pesquisa.',
            'file_path' => null,
            'original_filename' => null,
            'sort_order' => 1,
        ]);
    }
}
