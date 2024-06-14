<?php

namespace App\Http\Controllers\v1;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\AddRestaurantRequest;
use App\Http\Requests\Restaurant\UpdateRestaurantRequest;
use App\Http\Traits\ApiResponseTrait;
use App\Repositories\Restaurant\RestaurantRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RestaurantController extends Controller
{
    use ApiResponseTrait;

    private RestaurantRepository $restaurant;

    public function __construct(RestaurantRepository $restaurant)
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

    /**
     */
    public function create(AddRestaurantRequest $request): JsonResponse
    {
        if (Auth::user()->type !== config('constants.USER_TYPE.RESTAURANT')) {
            return $this->showFailureRequest(
                [],
              __('messages.restaurant.create.failed'),
              Response::HTTP_FORBIDDEN
            );
        }
        $restaurant = $this->restaurant->create($request->validated());
        return $this->showSuccessResponse(
          $restaurant,
          __('messages.restaurant.create.success'),
          Response::HTTP_CREATED
        );
    }

    public function update(UpdateRestaurantRequest $request): JsonResponse
    {
        if (Auth::user()->type !== config('constants.USER_TYPE.RESTAURANT')) {
            return $this->showFailureRequest(
                [],
                __('messages.restaurant.create.failed'),
                Response::HTTP_FORBIDDEN
            );
        }
        $restaurant = $this->restaurant->update($request->validated());
        return $this->showSuccessResponse(
          $restaurant,
          __('messages.restaurant.update.success'),
          Response::HTTP_OK
        );
    }
}
