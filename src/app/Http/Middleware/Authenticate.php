<?php

namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param Request $request
     * @return string|null
     */
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    protected function redirectIfAdmin(Request $request): string
    {

        if (! $request->expectsJson()) {
            return route('admin.login');
        }
    }

    /**
     * Handle an unauthenticated user.
     *
     * @param  Request  $request
     * @param  array  $guards
     * @return void
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function unauthenticated($request, array $guards)
    {
        foreach ($guards as $guard) {

            switch ($guard) {
                case 'admin':
                    throw new AuthenticationException(
                        'Unauthenticated.', $guards, $this->redirectIfAdmin($request)
                    );
                default:
                    throw new AuthenticationException(
                        'Unauthenticated.', $guards, $this->redirectTo($request)
                    );
            }

        }
    }
}
