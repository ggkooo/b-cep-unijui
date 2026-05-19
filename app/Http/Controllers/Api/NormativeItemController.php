<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\NormativeItemResource;
use App\Models\NormativeItem;
use App\Models\NormativeSection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NormativeItemController extends ContentController
{
    protected string $modelClass = NormativeItem::class;

    protected string $resourceClass = NormativeItemResource::class;

    protected ?string $storageDirectory = 'normativas';

    protected bool $fileRequiredOnStore = true;

    protected array $storeRules = [
        'title' => ['required', 'string'],
        'sort_order' => ['nullable', 'integer', 'min:0'],
    ];

    public function storeForSection(Request $request, NormativeSection $section): JsonResponse
    {
        $item = $this->createModel($request, [
            'normative_section_id' => $section->id,
        ]);

        return response()->json([
            'data' => new NormativeItemResource($item),
            'message' => 'Criado com sucesso.',
        ], Response::HTTP_CREATED);
    }
}
