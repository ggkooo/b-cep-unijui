<?php

namespace Database\Seeders;

use App\Models\GuidanceExample;
use App\Models\GuidancePoint;
use App\Models\GuidanceSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuidanceSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $section = GuidanceSection::query()->updateOrCreate(['id' => 1], [
            'title' => 'Uniformizar as informacoes',
            'warning' => null,
            'important' => null,
            'observation' => null,
            'sort_order' => 1,
        ]);

        GuidancePoint::query()->updateOrCreate(['id' => 1], [
            'guidance_section_id' => $section->id,
            'text' => 'Padronize as informacoes entre projeto, cronograma, orcamento e documentos anexos.',
            'sort_order' => 1,
        ]);

        GuidanceExample::query()->updateOrCreate(['id' => 1], [
            'guidance_section_id' => $section->id,
            'text' => 'Use o mesmo titulo do projeto em todos os documentos.',
            'sort_order' => 1,
        ]);
    }
}
