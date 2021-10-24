<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\DevelopersRequest;
use App\Services\Developer\DeveloperService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;

class DevelopersController extends Controller
{
    private $service;

    public function __construct(DeveloperService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request): JsonResponse
    {
        try {
            $filters = $request->only(
                [
                    'id',
                    'name',
                    'sex',
                    'age',
                    'hobby',
                    'birthDate',
                ]
            );

            $result = $this->service->all($filters);
            return response()->json($result->paginate(2), 200);
        } catch (Exception $exception) {
            return response()->json(
                [
                    'error' => $exception->getMessage()
                ]
                ,
                $exception->getCode()
            );
        }
    }

    public function store(DevelopersRequest $request): JsonResponse
    {
        try {
            $response = $this->service->create($request->all());
            return response()->json($response, 201);
        } catch (Exception $exception) {
            return response()->json(
                [
                    'error' => $exception->getMessage()
                ]
                ,
                400
            );
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            $response = $this->service->find($id);

            return response()->json($response, 200);
        } catch (Exception $exception) {
            return response()->json(
                [
                    'error' => $exception->getMessage()
                ]
                ,
                $exception->getCode()
            );
        }
    }

    public function update(DevelopersRequest $request, int $id): JsonResponse
    {
        try {
            $response = $this->service->update($request->all(), $id);

            return response()->json($response, 201);
        } catch (Exception $exception) {
            return response()->json(
                [
                    'error' => $exception->getMessage()
                ]
                ,
                $exception->getCode()
            );
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->service->delete($id);
            return response()->json(
                [
                    'message' => "Desenvolvedor deletado com sucesso."
                ],
                204
            );
        } catch (Exception $exception) {
            return response()->json(
                [
                    'error' => $exception->getMessage()
                ]
                ,
                $exception->getCode()
            );
        }
    }
}
