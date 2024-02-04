<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Http\Requests\User\VerifyOtpRequest;
use App\Http\Traits\ApiResponseTrait;
use App\Repositories\User\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    use ApiResponseTrait;
    private UserRepository $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $user = $this->user->login($request->validated());
        return $this->showSuccessResponse(
            $user,
            __('messages.user.login.success'),
            Response::HTTP_OK
        );
    }

    public function verifyOtp(VerifyOtpRequest $request): JsonResponse
    {
        $user = $this->user->verifyOtp($request->validated());
        return $this->showSuccessResponse(
            $user,
            __('messages.otp.success'),
            Response::HTTP_OK
        );
    }

    public function getUserProfile(): JsonResponse
    {
        $user = $this->user->getUserProfile(Auth::id());
        return $this->showSuccessResponse(
            $user,
            __('messages.user.profile.success'),
            Response::HTTP_OK
        );
    }

    public function updateUserProfile(UpdateProfileRequest $request): JsonResponse
    {
        $user = $this->user->updateUserProfile(Auth::id(), $request->validated());
        return $this->showSuccessResponse(
            $user,
            __('messages.user.profile.success'),
            Response::HTTP_OK
        );
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return $this->showSuccessResponse(
            [],
            __('messages.user.logout.success'),
            Response::HTTP_OK
        );
    }
}
