<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\TutorialResource;
use App\Models\Tutorial;

class TutorialController extends ContentController
{
    protected string $modelClass = Tutorial::class;

    protected string $resourceClass = TutorialResource::class;

    protected ?string $storageDirectory = 'tutoriais';

    protected array $storeRules = [
        'title' => ['required', 'string', 'max:255'],
        'description' => ['nullable', 'string'],
        'url' => ['nullable', 'string'],
        'sort_order' => ['nullable', 'integer', 'min:0'],
        'file' => ['nullable', 'file', 'max:20480'],
    ];
}
