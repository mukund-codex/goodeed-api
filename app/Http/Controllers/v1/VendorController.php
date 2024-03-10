<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\LoginRequest;
use App\Http\Requests\Vendor\UpdateStatusRequest;
use App\Http\Requests\Vendor\VerifyOtpRequest;
use App\Http\Traits\ApiResponseTrait;
use App\Repositories\Vendor\VendorRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VendorController extends Controller
{
    use ApiResponseTrait;

    private VendorRepository $vendor;

    public function __construct(VendorRepository $vendor)
    {
        $this->vendor = $vendor;
    }

    public function login(LoginRequest $request): JsonResponse
    {
        return $this->showSuccessResponse(
            $this->vendor->login($request->validated()),
            __('messages.vendor.login.success'),
            Response::HTTP_OK
        );
    }

    public function verifyOtp(VerifyOtpRequest $request): JsonResponse
    {
        return $this->showSuccessResponse(
            $this->vendor->verifyOtp($request->validated()),
            __('messages.vendor.otp.verified'),
            Response::HTTP_OK
        );
    }
}
