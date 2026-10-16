<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DocumentSection;
use Illuminate\Http\Request;

class DocumentSectionController extends Controller
{
    public function index()
    {
        $sections = DocumentSection::with('items')->orderBy('sort_order', 'asc')->get();
        return response()->json($sections, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $section = DocumentSection::create($validated);

        return response()->json($section->load('items'), 201);
    }

    public function show($id)
    {
        $section = DocumentSection::with('items')->findOrFail($id);
        return response()->json($section, 200);
    }

    public function update(Request $request, $id)
    {
        $section = DocumentSection::findOrFail($id);

        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $section->update($validated);

        return response()->json($section->load('items'), 200);
    }

    public function destroy($id)
    {
        $section = DocumentSection::withCount('items')->findOrFail($id);

        if ($section->items_count > 0) {
            return response()->json([
                'message' => 'Não é possível remover esta seção pois ela possui documentos atrelados a ela.'
            ], 422);
        }

        $section->delete();

        return response()->json(['message' => 'Seção removida com sucesso.'], 200);
    }
}
