<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    const ROLES = [
        'user' => 1,
        'admin' => 2,
        '*' => 3
    ];

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userRole = $request->user();
        $roles = array_slice(func_get_args(), 2);
        if ($userRole && $userRole->count() > 0) {
            $userRole = $userRole->id_role;
            $checkRole = false;

            foreach ($roles as $role) {
                if ($role == '*' || $userRole == self::ROLES[$role]) {
                    $checkRole = true;
                    break;
                }
            }
            if ($checkRole)
                return $next($request);
            else
                return abort(401);
        } else {
            return redirect('login');
        }
    }
}
