<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // return $request->expectsJson() ? null : route('login');

          // Mengarahkan langsung ke halaman login admin jika sedang mengakses rute admin
          if ($request->routeIs('admin.*')) {
            session()->flash('fail', 'You must login first');
            return route('admin.login'); // Menggunakan nama rute admin.login
        }
         // Mengarahkan ke halaman login jika tidak sedang mengakses rute admin
         return route('login'); // Menggunakan nama rute login



    }
}
