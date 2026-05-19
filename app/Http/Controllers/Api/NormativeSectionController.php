<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\NormativeSectionResource;
use App\Models\NormativeSection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

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
        $section = NormativeSection::query()->with('items')->findOrFail($id);

        foreach ($section->items as $item) {
            Storage::disk('public')->delete($item->file_path);
        }

        $section->delete();

        return response()->json(['message' => 'Removido com sucesso.']);
    }
}
