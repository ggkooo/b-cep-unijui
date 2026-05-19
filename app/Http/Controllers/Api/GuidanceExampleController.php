<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\GuidanceExampleResource;
use App\Models\GuidanceExample;
use App\Models\GuidanceSection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuidanceExampleController extends ContentController
{
    protected string $modelClass = GuidanceExample::class;

    protected string $resourceClass = GuidanceExampleResource::class;

    protected array $storeRules = [
        'text' => ['required', 'string'],
        'sort_order' => ['nullable', 'integer', 'min:0'],
    ];

    public function storeForSection(Request $request, GuidanceSection $section): JsonResponse
    {
        $example = $this->createModel($request, [
            'guidance_section_id' => $section->id,
        ]);

        return response()->json([
            'data' => new GuidanceExampleResource($example),
            'message' => 'Criado com sucesso.',
        ], Response::HTTP_CREATED);
    }
}
