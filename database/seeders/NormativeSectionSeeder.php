<?php

namespace Database\Seeders;

use App\Models\NormativeItem;
use App\Models\NormativeSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NormativeSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $section = NormativeSection::query()->updateOrCreate(['id' => 1], [
            'title' => 'Normativas',
            'sort_order' => 1,
        ]);

        NormativeItem::query()->updateOrCreate(['id' => 1], [
            'normative_section_id' => $section->id,
            'title' => 'Regimento do CEP UNIJUI',
            'file_path' => 'normativas/regimento-cep-unijui.pdf',
            'original_filename' => 'regimento-cep-unijui.pdf',
            'sort_order' => 1,
        ]);
    }
}
