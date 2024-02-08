<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dishes\AddDishesRequest;
use App\Http\Requests\Dishes\GetDishesRequest;
use App\Http\Requests\Dishes\ListDishesRequest;
use App\Http\Requests\Dishes\UpdateDishesRequest;
use App\Http\Traits\ApiResponseTrait;
use App\Repositories\Dishes\DishesRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class DishesController extends Controller
{
    use ApiResponseTrait;

    private DishesRepository $dishesRepository;

    public function __construct(DishesRepository $dishesRepository)
    {
        $this->dishesRepository = $dishesRepository;
    }

    public function list(ListDishesRequest $request): JsonResponse
    {
        $dishes = $this->dishesRepository->list($request->validated());
        return $this->showSuccessResponse($dishes, __('messages.success.listing'), 200);
    }

    public function create(AddDishesRequest $request): JsonResponse
    {
        $data = $request->validated();
        $dishes = $this->dishesRepository->create($data);
        return $this->showSuccessResponse($dishes, __('messages.success.created'), 200);
    }

    public function update(UpdateDishesRequest $request): JsonResponse
    {
        $data = $request->validated();
        $dishes = $this->dishesRepository->update($data);
        return $this->showSuccessResponse($dishes, __('messages.success.updated'), 200);
    }

    public function getDishes(GetDishesRequest $request): JsonResponse
    {
        $dishes = $this->dishesRepository->getDishes($request->validated());
        return $this->showSuccessResponse($dishes, __('messages.success.listing'), 200);
    }
}
