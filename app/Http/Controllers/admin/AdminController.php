<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Repositories\Admin\AdminRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    private AdminRepository $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function loginHandler(LoginRequest $request): string
    {
        return $this->adminRepository->loginHandler($request->validated());
    }

    public function logoutHandler(Request $request): string
    {
        return $this->adminRepository->logoutHandler($request);
    }
}
