<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserAkses
{
    /**
     * Menangani permintaan yang masuk.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Memeriksa apakah pengguna terautentikasi
        if (!$request->user()) {
            return response()->json([
                'message' => 'Tidak terautentikasi. Silakan masuk.',
                'status' => 401
            ], 401);
        }

        // Memeriksa apakah peran pengguna cocok dengan peran yang dibutuhkan
        if ($request->user()->role == $role) {
            return $next($request);
        }

        // Mengembalikan respons JSON jika akses ditolak
        return response()->json([
            'message' => 'Anda tidak memiliki akses untuk peran ini.',
            'status' => 403
        ], 403);
    }

}
