<?php

namespace App\Http\Middleware;

 
use App\Trait\ModulePermissionTrait;
use Brian2694\Toastr\Facades\Toastr;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ModulePermission
{
    use ModulePermissionTrait;
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next,$module): Response|RedirectResponse
    {
        if ($this->modulePermissionCheck($module)) {
            return $next($request);
        }
        Toastr::info('Access Denied');
        return back();
    }

}
