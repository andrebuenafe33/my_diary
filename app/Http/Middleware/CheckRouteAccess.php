<?php

namespace App\Http\Middleware;


use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckRouteAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $protectedRoutes = [
            'admin',
            'diaries.index',
            'diaries.create',
            'diaries.show',
            'diaries.edit',
            'diaries.update',
            'diaries.store',
            'diaries.destroy',
            'diaries.print',
            'documentations.index',
            'documentations.create',
            'documentations.store',
            'documentations.show',
            'documentations.edit',
            'documentations.update',
            'documentations.destroy',
            'approval-requests.index',
            'approval-requests.create',
            'approval-requests.store',
            'approval-requests.show',
            'approval-requests.edit',
            'approval-requests.update',
            'approval-requests.destroy',
            'approval-requests.print',
            'approval-requests.approve',
            'approval-requests.reject',
            'users.index',
            'users.create',
            'users.store',
            'users.show',
            'users.edit',
            'users.update',
            'users.destroy',
            'users.updateProfileName',
            'profile.index',
            'profile.update',
        ];

        $currentRouteName = $request->route()->getName();

        $isProtectedRoute = in_array($currentRouteName, $protectedRoutes);
       

        if ($isProtectedRoute && !Auth::check()) {
            return redirect()->route('not-authorized');
        }

        if (Auth::check()) {
            $user = Auth::user();
            $allowedRoles = [];
            if ($currentRouteName === 'admin' || (in_array($currentRouteName,[
                'profile.index',
                'profile.update',
                'diaries.index',
                'diaries.create',
                'diaries.show',
                'diaries.edit',
                'diaries.store',
                'diaries.destroy',
                'diaries.update',
                'diaries.print',
                'documentations.index',
                'documentations.create',
                'documentations.store',
                'documentations.show',
                'documentations.edit',
                'documentations.update',
                'documentations.destroy',
                'approval-requests.print',
                'users.updateProfilePic',
                'users.updateSignature',
                'users.updateProfileName',
                'users.updatePassword'
            ]))) {
                $allowedRoles = [1, 2, 3];
            } elseif (in_array($currentRouteName, [                    
                    'approval-requests.index',
                    'approval-requests.create',
                    'approval-requests.store',
                    'approval-requests.show',
                    'approval-requests.edit',
                    'approval-requests.update',
                    'approval-requests.destroy',
                    'approval-requests.print',
                    'approval-requests.approve',
                    'approval-requests.reject',
                    'users.updateProfilePic',
                    'users.updateSignature',
                    'users.updateProfileName',
                    'users.show',
                    'users.updatePassword'
                ])) {
                $allowedRoles = [1, 2];
            } elseif (in_array($currentRouteName,[
                    'users.index',
                    'users.create',
                    'users.store',
                    'users.show',
                    'users.edit',
                    'users.update',
                    'users.destroy',
                    'approval-requests.print',
                    'approval-requests.approve',
                    'approval-requests.reject',
                    'users.updatePassword'
            ])) {
                $allowedRoles = [1];
            }
            // Check if the user's role is authorized to access the route
            if (!in_array($user->role, $allowedRoles)) {
                return redirect()->route('not-authorized');
            }
        }

        return $next($request);
    }
}
