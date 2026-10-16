<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DocumentItem;
use App\Models\DocumentSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentItemController extends Controller
{
    public function storeForSection(Request $request, $section)
    {
        $sectionModel = DocumentSection::findOrFail($section);

        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'file'        => 'nullable|file|max:20480',
            'sort_order'  => 'nullable|integer',
        ]);

        $filePath = null;
        $originalFilename = null;

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $originalFilename = $file->getClientOriginalName();
            $filePath = $file->store('document-items', 'public');
        }

        $item = DocumentItem::create([
            'document_section_id' => $sectionModel->id,
            'name'                => $request->name,
            'description'         => $request->description ?? '',
            'file_path'           => $filePath,
            'original_filename'   => $originalFilename,
            'sort_order'          => $request->sort_order ?? 0,
        ]);

        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $item = DocumentItem::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'file'        => 'nullable|file|max:20480',
            'sort_order'  => 'nullable|integer',
        ]);

        $data = [
            'name'        => $request->name,
            'description' => $request->description ?? '',
            'sort_order'  => $request->sort_order ?? $item->sort_order,
        ];

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            if ($item->file_path && Storage::disk('public')->exists($item->file_path)) {
                Storage::disk('public')->delete($item->file_path);
            }

            $file = $request->file('file');
            $data['original_filename'] = $file->getClientOriginalName();
            $data['file_path']         = $file->store('document-items', 'public');
        }

        $item->update($data);

        return response()->json($item, 200);
    }

    public function destroy($id)
    {
        $item = DocumentItem::findOrFail($id);

        if ($item->file_path && Storage::disk('public')->exists($item->file_path)) {
            Storage::disk('public')->delete($item->file_path);
        }

        $item->delete();

        return response()->json(['message' => 'Documento removido com sucesso.'], 200);
    }
}
