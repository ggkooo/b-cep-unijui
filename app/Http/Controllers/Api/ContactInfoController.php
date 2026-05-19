<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ContactInfoResource;
use App\Models\ContactInfo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactInfoController extends ContentController
{
    protected string $modelClass = ContactInfo::class;

    protected string $resourceClass = ContactInfoResource::class;

    protected array $storeRules = [
        'institution_name' => ['required', 'string', 'max:255'],
        'address' => ['required', 'string', 'max:255'],
        'city_state_zip' => ['required', 'string', 'max:255'],
        'phone' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'service_hours' => ['required', 'string', 'max:255'],
    ];

    public function show(): ContactInfoResource
    {
        return new ContactInfoResource(ContactInfo::query()->firstOrCreate([
            'id' => 1,
        ], [
            'institution_name' => '',
            'address' => '',
            'city_state_zip' => '',
            'phone' => '',
            'email' => 'cep@example.com',
            'service_hours' => '',
        ]));
    }

    public function update(Request $request, int $id = 1): JsonResponse
    {
        $validated = $request->validate($this->storeRules);
        $contactInfo = ContactInfo::query()->updateOrCreate(['id' => 1], $validated);

        return response()->json([
            'data' => new ContactInfoResource($contactInfo),
            'message' => 'Atualizado com sucesso.',
        ]);
    }
}
