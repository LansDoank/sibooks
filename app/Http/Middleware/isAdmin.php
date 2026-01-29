<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SweetAlert2\Laravel\Swal;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
        return redirect()->route('login');
    }

        $user = Auth::user();

        if ($user->role->name == 'admin') {
            return $next($request);
        } 
        
        Swal::warning([
                    'title' => 'Gagal!',
                    'text' => 'Anda tidak memiliki akses ke halaman tersebut.',
                ]);

        return redirect()->route('index');
    }
}
