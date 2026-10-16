<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\NormativeSectionResource;
use App\Models\NormativeSection;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class NormativeSectionController extends ContentController
{
    protected string $modelClass = NormativeSection::class;

    protected string $resourceClass = NormativeSectionResource::class;

    protected array $relations = ['items'];

    protected array $storeRules = [
        'title' => ['required', 'string', 'max:255'],
        'sort_order' => ['nullable', 'integer', 'min:0'],
    ];

    public function destroy(int $id): JsonResponse
    {
        $section = NormativeSection::query()->withCount('items')->findOrFail($id);

        if ($section->items_count > 0) {
            return response()->json([
                'message' => 'Não é possível remover esta seção pois ela possui normativas atreladas a ela.',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $section->delete();

        return response()->json(['message' => 'Seção removida com sucesso.']);
    }
}
