<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Member::query()->upsert([
            [
                'id' => 1,
                'category' => 'Coordenadores',
                'role' => 'Coordenador',
                'name' => 'Prof. Dr. Aldemir Berwig',
                'education' => 'Direito e Administracao',
                'qualification' => 'Doutorado em Educacao nas Ciencias - UNIJUI',
                'notes' => null,
                'sort_order' => 1,
            ],
        ], ['id'], ['category', 'role', 'name', 'education', 'qualification', 'notes', 'sort_order']);
    }
}
