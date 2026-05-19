<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\DocumentSectionResource;
use App\Models\DocumentSection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class DocumentSectionController extends ContentController
{
    protected string $modelClass = DocumentSection::class;

    protected string $resourceClass = DocumentSectionResource::class;

    protected array $relations = ['items'];

    protected array $storeRules = [
        'title' => ['required', 'string', 'max:255'],
        'sort_order' => ['nullable', 'integer', 'min:0'],
    ];

    public function destroy(int $id): JsonResponse
    {
        $section = DocumentSection::query()->with('items')->findOrFail($id);

        foreach ($section->items as $item) {
            if ($item->file_path) {
                Storage::disk('public')->delete($item->file_path);
            }
        }

        $section->delete();

        return response()->json(['message' => 'Removido com sucesso.']);
    }
}
