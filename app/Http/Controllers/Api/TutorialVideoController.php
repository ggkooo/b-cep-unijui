<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\TutorialVideoResource;
use App\Models\TutorialVideo;

class TutorialVideoController extends ContentController
{
    protected string $modelClass = TutorialVideo::class;

    protected string $resourceClass = TutorialVideoResource::class;

    protected array $storeRules = [
        'title' => ['required', 'string', 'max:255'],
        'url' => ['nullable', 'string'],
        'sort_order' => ['nullable', 'integer', 'min:0'],
    ];
}
