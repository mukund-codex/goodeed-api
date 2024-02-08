<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
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

}
