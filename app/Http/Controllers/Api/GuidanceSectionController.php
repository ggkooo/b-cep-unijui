<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\GuidanceSectionResource;
use App\Models\GuidanceSection;

class GuidanceSectionController extends ContentController
{
    protected string $modelClass = GuidanceSection::class;

    protected string $resourceClass = GuidanceSectionResource::class;

    protected array $relations = ['points', 'examples'];

    protected array $storeRules = [
        'title' => ['required', 'string', 'max:255'],
        'warning' => ['nullable', 'string'],
        'important' => ['nullable', 'string'],
        'observation' => ['nullable', 'string'],
        'sort_order' => ['nullable', 'integer', 'min:0'],
    ];
}
