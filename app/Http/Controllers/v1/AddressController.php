<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\AddAddressRequest;
use App\Http\Requests\Address\DeleteAddressRequest;
use App\Http\Requests\Address\UpdateAddressRequest;
use App\Http\Traits\ApiResponseTrait;
use App\Repositories\Address\AddressRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AddressController extends Controller
{
    use ApiResponseTrait;

    private AddressRepository $address;

    public function __construct(AddressRepository $address)
    {
        $this->address = $address;
    }

    public function getAddress(Request $request): JsonResponse
    {
        $address = $this->address->getAddress(Auth::id());
        return $this->showSuccessResponse(
            $address,
            __('messages.address.get.success'),
            Response::HTTP_OK
        );
    }

    public function addAddress(AddAddressRequest $request): JsonResponse
    {
        $address = $this->address->addAddress(Auth::id(), $request->all());
        return $this->showSuccessResponse(
            $address,
            __('messages.address.add.success'),
            Response::HTTP_CREATED
        );
    }

    public function updateAddress(UpdateAddressRequest $request, $id): JsonResponse
    {
        $address = $this->address->updateAddress(Auth::id(), $id, $request->all());
        return $this->showSuccessResponse(
            $address,
            __('messages.address.update.success'),
            Response::HTTP_OK
        );
    }

    public function deleteAddress(DeleteAddressRequest $request, $id): JsonResponse
    {
        $this->address->deleteAddress(Auth::id(), $id);
        return $this->showSuccessResponse(
            [],
            __('messages.address.delete.success'),
            Response::HTTP_OK
        );
    }
}
