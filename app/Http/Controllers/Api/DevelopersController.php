<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\DevelopersRequest;
use App\Servicer\Developer\DeveloperService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;

class DevelopersController extends Controller
{
    private $service;

    public function __construct(DeveloperService $service) {
        $this->service = $service;
    }

    public function index(Request $request): JsonResponse
    {

        try {

            $filters = $request->only([
                'id',
                'name',
                'sex',
                'age',
                'hobby',
                'birthDate',
            ]);

            $result = $this->service->find($filters);
            return response()->json($result->paginate(2), 200);
        } catch (Exception $exception) {
            return response()->json("Ocorre um erro ao tentar buscar os desenvolvedores.",404);
        }
    }

    public function store(DevelopersRequest $request): JsonResponse
    {

        try {
            $response = $this->service->create($request->all());
            return response()->json($response, 201);
        } catch (Exception $exception) {
            return response()->json("Ocorre um erro ao tentar cadastrar o desenvolvedor.",400);
        }

    }

    public function show(int $id): JsonResponse
    {
        try {
            $return = $this->service->find(['id' => $id]);

            return response()->json($return->first(),200);
        } catch (Exception $exception) {
            return response()->json("Ocorreu um erro ao tentar buscar as informações do desenvolvedor.",404);
        }
    }

    public function update(DevelopersRequest $request, int $id): JsonResponse
    {
        try {
            $this->service->update($request->all(), $id);
            return response()->json('Desenvolvedor atualizado com sucesso.', 201);
        } catch (Exception $exception) {
            return response()->json('Não foi possível atualizar o desenvolvedor.', 400);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->service->delete($id);
            return response()->json("Desenvolvedor deletado com sucesso.", 204);
        } catch (Exception $exception) {
            return response()->json("Não foi possível deletar o Desenvolvedor.", 400);
        }
    }
}
