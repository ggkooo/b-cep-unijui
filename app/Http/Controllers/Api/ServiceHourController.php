<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ServiceHourResource;
use App\Models\ServiceHour;

class ServiceHourController extends ContentController
{
    protected string $modelClass = ServiceHour::class;

    protected string $resourceClass = ServiceHourResource::class;

    protected array $storeRules = [
        'weekday' => ['required', 'string', 'max:255'],
        'hours' => ['required', 'string', 'max:255'],
        'sort_order' => ['nullable', 'integer', 'min:0'],
    ];
}
