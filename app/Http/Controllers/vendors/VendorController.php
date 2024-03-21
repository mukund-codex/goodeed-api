<?php

namespace App\Http\Controllers\vendors;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\LoginRequest;
use App\Http\Requests\Vendor\PanelLoginRequest;
use App\Http\Requests\Vendor\RegisterRequest;
use App\Repositories\Vendor\VendorRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    private VendorRepository $vendor;

    public function __construct(VendorRepository $vendor)
    {
        $this->vendor = $vendor;
    }

    public function registerSuccess(): View
    {
        return view('vendors.auth.register-success');
    }

    public function create(RegisterRequest $request): RedirectResponse
    {
        $this->vendor->create($request->validated());
        return redirect()->route('vendors.register-success');
    }

    public function verify(string $token): RedirectResponse
    {
        $this->vendor->verify($token);
        return redirect()->route('vendors.login');
    }


    public function loginHandler(PanelLoginRequest $request): RedirectResponse
    {
        $response = $this->vendor->loginHandler($request->validated());
        return redirect()->route($response['route'])->with($response['status'], $response['message']);
    }

    public function logoutHandler(Request $request): RedirectResponse
    {
        Auth::guard('vendor')->logout();
        return redirect()->route('vendors.login')->with('fail', 'You have been logged out');
    }
}
