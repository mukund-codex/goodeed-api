<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\AddRestaurantRequest;
use App\Http\Requests\Restaurant\UpdateRestaurantRequest;
use App\Http\Traits\ApiResponseTrait;
use App\Repositories\Restaurant\RestaurantRespository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestaurantController extends Controller
{
    use ApiResponseTrait;

    private RestaurantRespository $restaurant;

    public function __construct(RestaurantRespository $restaurant)
    {
        $this->restaurant = $restaurant;
    }

    public function list(): JsonResponse
    {
        $restaurants = $this->restaurant->list();
        return $this->showSuccessResponse(
          $restaurants,
          __('messages.restaurant.list.success'),
          Response::HTTP_OK
        );
    }

    public function create(AddRestaurantRequest $request): JsonResponse
    {
        $restaurant = $this->restaurant->create($request->validated());
        return $this->showSuccessResponse(
          $restaurant,
          __('messages.restaurant.create.success'),
          Response::HTTP_CREATED
        );
    }

    public function update(UpdateRestaurantRequest $request): JsonResponse
    {
        $restaurant = $this->restaurant->update($request->validated());
        return $this->showSuccessResponse(
          $restaurant,
          __('messages.restaurant.update.success'),
          Response::HTTP_OK
        );
    }
}
