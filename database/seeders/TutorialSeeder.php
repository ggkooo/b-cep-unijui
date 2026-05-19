<?php

namespace Database\Seeders;

use App\Models\Tutorial;
use App\Models\TutorialFaq;
use App\Models\TutorialVideo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TutorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tutorial::query()->upsert([
            [
                'id' => 1,
                'title' => 'Tutorial de submissao de projetos',
                'description' => 'Passo a passo para submissao na Plataforma Brasil.',
                'file_path' => null,
                'original_filename' => null,
                'sort_order' => 1,
            ],
        ], ['id'], ['title', 'description', 'file_path', 'original_filename', 'sort_order']);

        TutorialVideo::query()->upsert([
            ['id' => 1, 'title' => 'Como submeter um projeto', 'url' => 'https://www.youtube.com/', 'thumbnail_path' => null, 'sort_order' => 1],
        ], ['id'], ['title', 'url', 'thumbnail_path', 'sort_order']);

        TutorialFaq::query()->upsert([
            ['id' => 1, 'question' => 'Onde submeter o projeto?', 'answer' => 'A submissao deve ser realizada na Plataforma Brasil.', 'sort_order' => 1],
        ], ['id'], ['question', 'answer', 'sort_order']);
    }
}
