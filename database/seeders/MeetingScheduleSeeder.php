<?php

namespace Database\Seeders;

use App\Models\MeetingSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeetingScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MeetingSchedule::query()->upsert([
            ['id' => 1, 'year' => 2025, 'submission_deadline' => 'Ate 20 de janeiro', 'meeting_date' => '28 de fevereiro', 'sort_order' => 1],
            ['id' => 2, 'year' => 2025, 'submission_deadline' => 'Ate 20 de fevereiro', 'meeting_date' => '28 de marco', 'sort_order' => 2],
        ], ['id'], ['year', 'submission_deadline', 'meeting_date', 'sort_order']);
    }
}
