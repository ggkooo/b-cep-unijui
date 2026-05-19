<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\TutorialVideoResource;
use App\Models\TutorialVideo;

class TutorialVideoController extends ContentController
{
    protected string $modelClass = TutorialVideo::class;

    protected string $resourceClass = TutorialVideoResource::class;

    protected ?string $storageDirectory = 'tutorial-videos';

    protected string $fileInput = 'thumbnail';

    protected string $filePathColumn = 'thumbnail_path';

    protected ?string $originalFilenameColumn = null;

    protected array $fileRules = ['image', 'max:5120'];

    protected array $storeRules = [
        'title' => ['required', 'string', 'max:255'],
        'url' => ['required', 'url', 'max:255'],
        'sort_order' => ['nullable', 'integer', 'min:0'],
    ];
}
