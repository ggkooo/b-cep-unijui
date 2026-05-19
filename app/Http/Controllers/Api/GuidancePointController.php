<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\GuidancePointResource;
use App\Models\GuidancePoint;
use App\Models\GuidanceSection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuidancePointController extends ContentController
{
    protected string $modelClass = GuidancePoint::class;

    protected string $resourceClass = GuidancePointResource::class;

    protected array $storeRules = [
        'text' => ['required', 'string'],
        'sort_order' => ['nullable', 'integer', 'min:0'],
    ];

    public function storeForSection(Request $request, GuidanceSection $section): JsonResponse
    {
        $point = $this->createModel($request, [
            'guidance_section_id' => $section->id,
        ]);

        return response()->json([
            'data' => new GuidancePointResource($point),
            'message' => 'Criado com sucesso.',
        ], Response::HTTP_CREATED);
    }
}
