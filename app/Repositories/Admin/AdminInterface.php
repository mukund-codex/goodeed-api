<?php

namespace App\Repositories\Admin;

interface AdminInterface
{
    public function loginHandler($request): string;

    public function logoutHandler($request): string;
}
