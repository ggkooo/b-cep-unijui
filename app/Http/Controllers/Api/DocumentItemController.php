<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\DocumentItemResource;
use App\Models\DocumentItem;
use App\Models\DocumentSection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DocumentItemController extends ContentController
{
    protected string $modelClass = DocumentItem::class;

    protected string $resourceClass = DocumentItemResource::class;

    protected ?string $storageDirectory = 'documentos';

    protected array $storeRules = [
        'name' => ['required', 'string', 'max:255'],
        'description' => ['required', 'string', 'max:255'],
        'sort_order' => ['nullable', 'integer', 'min:0'],
    ];

    public function storeForSection(Request $request, DocumentSection $section): JsonResponse
    {
        $item = $this->createModel($request, [
            'document_section_id' => $section->id,
        ]);

        return response()->json([
            'data' => new DocumentItemResource($item),
            'message' => 'Criado com sucesso.',
        ], Response::HTTP_CREATED);
    }
}
