<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\TrainingTopicResource;
use App\Models\TrainingTopic;

class TrainingTopicController extends ContentController
{
    protected string $modelClass = TrainingTopic::class;

    protected string $resourceClass = TrainingTopicResource::class;

    protected array $storeRules = [
        'text' => ['required', 'string', 'max:255'],
        'sort_order' => ['nullable', 'integer', 'min:0'],
    ];
}
