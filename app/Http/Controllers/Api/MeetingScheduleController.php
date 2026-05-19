<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\MeetingScheduleResource;
use App\Models\MeetingSchedule;
use Illuminate\Http\Request;

class MeetingScheduleController extends ContentController
{
    protected string $modelClass = MeetingSchedule::class;

    protected string $resourceClass = MeetingScheduleResource::class;

    protected array $storeRules = [
        'year' => ['required', 'integer', 'min:2000', 'max:2100'],
        'submission_deadline' => ['required', 'string', 'max:255'],
        'meeting_date' => ['required', 'string', 'max:255'],
        'sort_order' => ['nullable', 'integer', 'min:0'],
    ];

    protected function applyFilters($query, Request $request): void
    {
        if ($request->filled('year')) {
            $query->where('year', $request->integer('year'));
        }
    }
}
