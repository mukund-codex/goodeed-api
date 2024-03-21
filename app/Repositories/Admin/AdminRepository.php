<?php

namespace App\Repositories\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminRepository implements AdminInterface
{
    private Admin $admin;

    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    public function loginHandler($request): string
    {
        if (Auth::guard('admin')->attempt($request)) {
            return redirect()->route('admin.dashboard');
        }

        session()->flash('fail', 'Invalid credentials');
        return redirect()->route('admin.login');
    }

    public function logoutHandler($request): string
    {
        Auth::guard('admin')->logout();
        session()->flash('fail', 'You have been logged out');
        return redirect()->route('admin.login');
    }
}
