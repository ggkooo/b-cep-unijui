<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\TrainingMaterialResource;
use App\Models\TrainingMaterial;

class TrainingMaterialController extends ContentController
{
    protected string $modelClass = TrainingMaterial::class;

    protected string $resourceClass = TrainingMaterialResource::class;

    protected ?string $storageDirectory = 'materiais';

    protected array $storeRules = [
        'title' => ['required', 'string', 'max:255'],
        'description' => ['required', 'string', 'max:255'],
        'sort_order' => ['nullable', 'integer', 'min:0'],
    ];
}
