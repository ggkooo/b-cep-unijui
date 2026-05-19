<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\MemberResource;
use App\Models\Member;

class MemberController extends ContentController
{
    protected string $modelClass = Member::class;

    protected string $resourceClass = MemberResource::class;

    protected array $storeRules = [
        'category' => ['required', 'in:Coordenadores,Membros,Representantes de Participante de Pesquisa,Secretaria'],
        'role' => ['required', 'string', 'max:255'],
        'name' => ['required', 'string', 'max:255'],
        'education' => ['required', 'string', 'max:255'],
        'qualification' => ['required', 'string', 'max:255'],
        'notes' => ['nullable', 'string', 'max:255'],
        'sort_order' => ['nullable', 'integer', 'min:0'],
    ];
}
