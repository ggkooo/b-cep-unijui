<?php

namespace Database\Seeders;

use App\Models\TrainingMaterial;
use App\Models\TrainingTopic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TrainingTopic::query()->upsert([
            ['id' => 1, 'text' => 'Diretrizes eticas nacionais e internacionais', 'sort_order' => 1],
            ['id' => 2, 'text' => 'Submissao de projetos na Plataforma Brasil', 'sort_order' => 2],
        ], ['id'], ['text', 'sort_order']);

        TrainingMaterial::query()->upsert([
            [
                'id' => 1,
                'title' => 'Material de apoio Educa CEPs',
                'description' => 'Documento de apoio para capacitacoes.',
                'file_path' => null,
                'original_filename' => null,
                'sort_order' => 1,
            ],
        ], ['id'], ['title', 'description', 'file_path', 'original_filename', 'sort_order']);
    }
}
