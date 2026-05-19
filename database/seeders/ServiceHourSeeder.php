<?php

namespace Database\Seeders;

use App\Models\ServiceHour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceHour::query()->upsert([
            ['id' => 1, 'weekday' => 'Segunda-feira', 'hours' => '7h45min as 11h30min e das 13h30min as 17h15min', 'sort_order' => 1],
            ['id' => 2, 'weekday' => 'Terca-feira', 'hours' => '7h45min as 11h30min e das 13h30min as 17h15min', 'sort_order' => 2],
            ['id' => 3, 'weekday' => 'Quarta-feira', 'hours' => '7h45min as 11h30min e das 13h30min as 17h15min', 'sort_order' => 3],
            ['id' => 4, 'weekday' => 'Quinta-feira', 'hours' => '7h45min as 11h30min e das 13h30min as 17h15min', 'sort_order' => 4],
            ['id' => 5, 'weekday' => 'Sexta-feira', 'hours' => '7h45min as 11h30min e das 13h30min as 17h15min', 'sort_order' => 5],
        ], ['id'], ['weekday', 'hours', 'sort_order']);
    }
}
