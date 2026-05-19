<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

abstract class ContentController extends Controller
{
    protected string $modelClass;

    protected string $resourceClass;

    protected array $storeRules = [];

    protected array $updateRules = [];

    protected array $relations = [];

    protected ?string $storageDirectory = null;

    protected string $fileInput = 'file';

    protected string $filePathColumn = 'file_path';

    protected ?string $originalFilenameColumn = 'original_filename';

    protected bool $fileRequiredOnStore = false;

    protected array $fileRules = ['mimes:pdf,doc,docx,txt', 'max:20480'];

    public function index(Request $request)
    {
        $query = $this->modelClass::query()
            ->with($this->relations)
            ->orderBy('sort_order')
            ->orderBy('id');

        $this->applyFilters($query, $request);

        return $this->resourceClass::collection($query->get());
    }

    public function store(Request $request): JsonResponse
    {
        $model = $this->createModel($request, []);

        return response()->json([
            'data' => $this->makeResource($model),
            'message' => 'Criado com sucesso.',
        ], Response::HTTP_CREATED);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $model = $this->findModel($id);
        $validated = $request->validate($this->rulesForUpdate());
        $this->storeUploadedFile($request, $validated, $model);
        $model->update($validated);
        $model->load($this->relations);

        return response()->json([
            'data' => $this->makeResource($model),
            'message' => 'Atualizado com sucesso.',
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $model = $this->findModel($id);
        $this->deleteModelFiles($model);
        $model->delete();

        return response()->json(['message' => 'Removido com sucesso.']);
    }

    public function reorder(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'items' => ['required', 'array'],
            'items.*.id' => ['required', 'integer', 'exists:'.$this->tableName().',id'],
            'items.*.sort_order' => ['required', 'integer', 'min:0'],
        ]);

        foreach ($validated['items'] as $item) {
            $this->modelClass::whereKey($item['id'])->update([
                'sort_order' => $item['sort_order'],
            ]);
        }

        return response()->json(['message' => 'Atualizado com sucesso.']);
    }

    protected function applyFilters($query, Request $request): void
    {
        //
    }

    protected function createModel(Request $request, array $extraAttributes): Model
    {
        $validated = array_merge($request->validate($this->rulesForStore()), $extraAttributes);
        $this->storeUploadedFile($request, $validated);
        $model = $this->modelClass::create($validated);
        $model->load($this->relations);

        return $model;
    }

    protected function rulesForStore(): array
    {
        $rules = $this->storeRules;

        if ($this->storageDirectory) {
            $rules[$this->fileInput] = [
                $this->fileRequiredOnStore ? 'required' : 'nullable',
                'file',
                ...$this->fileRules,
            ];
        }

        return $rules;
    }

    protected function rulesForUpdate(): array
    {
        $rules = $this->updateRules ?: $this->storeRules;

        if ($this->storageDirectory) {
            $rules[$this->fileInput] = ['nullable', 'file', ...$this->fileRules];
        }

        return $rules;
    }

    protected function storeUploadedFile(Request $request, array &$validated, ?Model $model = null): void
    {
        if (! $this->storageDirectory || ! $request->hasFile($this->fileInput)) {
            unset($validated[$this->fileInput]);

            return;
        }

        if ($model instanceof Model) {
            $this->deleteModelFiles($model);
        }

        $file = $request->file($this->fileInput);
        $path = $file->storeAs(
            $this->storageDirectory,
            Str::uuid().'.'.$file->getClientOriginalExtension(),
            'public'
        );

        $validated[$this->filePathColumn] = $path;

        if ($this->originalFilenameColumn) {
            $validated[$this->originalFilenameColumn] = $file->getClientOriginalName();
        }

        unset($validated[$this->fileInput]);
    }

    protected function deleteModelFiles(Model $model): void
    {
        $path = $model->{$this->filePathColumn} ?? null;

        if ($path) {
            Storage::disk('public')->delete($path);
        }
    }

    protected function findModel(int $id): Model
    {
        return $this->modelClass::query()->findOrFail($id);
    }

    protected function makeResource(Model $model): JsonResource
    {
        return new $this->resourceClass($model);
    }

    protected function tableName(): string
    {
        return (new $this->modelClass())->getTable();
    }
}
