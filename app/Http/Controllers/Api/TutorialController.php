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
        'description' => ['required', 'string', 'max:255'],
        'sort_order' => ['nullable', 'integer', 'min:0'],
    ];
}
