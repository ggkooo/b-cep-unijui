<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\TutorialFaqResource;
use App\Models\TutorialFaq;

class TutorialFaqController extends ContentController
{
    protected string $modelClass = TutorialFaq::class;

    protected string $resourceClass = TutorialFaqResource::class;

    protected array $storeRules = [
        'question' => ['required', 'string', 'max:255'],
        'answer' => ['required', 'string'],
        'sort_order' => ['nullable', 'integer', 'min:0'],
    ];
}
