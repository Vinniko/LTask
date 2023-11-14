<?php

namespace App\Http\Middleware;

use App\Services\BasicAuthService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class BasicAuth
{
    private $authService;

    public function __construct(BasicAuthService $basicAuthService)
    {
        $this->authService = $basicAuthService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $this->authService->auth($request->getUser(), $request->getPassword()) ? $next($request) : abort(403);
    }
}
