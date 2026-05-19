<?php

namespace Database\Seeders;

use App\Models\ContactInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactInfo::query()->updateOrCreate(['id' => 1], [
            'institution_name' => 'Comite de Etica em Pesquisa da UNIJUI',
            'address' => 'Rua do Comercio, 3000 - Bairro Universitario',
            'city_state_zip' => 'Ijui/RS - CEP 98700-000',
            'phone' => '(55) 3332-0200',
            'email' => 'cep@unijui.edu.br',
            'service_hours' => 'Segunda a sexta-feira: 8h as 11h30 e 13h30 as 17h',
        ]);
    }
}
