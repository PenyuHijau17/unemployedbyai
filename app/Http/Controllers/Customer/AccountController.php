<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    /**
     * =========================================================
     * AKUN SAYA
     * =========================================================
     */
    public function index()
    {
        $user = auth()->user();

        // TOTAL PESANAN
        $totalOrders = $user->orders()->count();

        // PENDING
        $pending = $user->orders()
            ->where('status', 'pending')
            ->count();

        // DIPROSES
        $processing = $user->orders()
            ->whereIn('status', [
                'processing',
                'packed'
            ])
            ->count();

        // DIKIRIM
        $shipped = $user->orders()
            ->where('status', 'shipped')
            ->count();

        // SELESAI
        $completed = $user->orders()
            ->whereIn('status', [
                'completed',
                'selesai'
            ])
            ->count();

        return view(
            'customer.account.index',
            compact(
                'user',
                'totalOrders',
                'pending',
                'processing',
                'shipped',
                'completed'
            )
        );
    }

    /**
     * =========================================================
     * EDIT PROFIL
     * =========================================================
     */
    public function edit()
    {
        $user = auth()->user();

        return view(
            'customer.account.edit',
            compact('user')
        );
    }

    /**
     * =========================================================
     * UPDATE PROFIL
     * =========================================================
     */
    public function update(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
            ],

            'profile_photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        $user = auth()->user();

        /*
        |--------------------------------------------------------------------------
        | DATA PROFIL
        |--------------------------------------------------------------------------
        */

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        /*
        |--------------------------------------------------------------------------
        | UPLOAD FOTO PROFIL
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_photo')) {

            /*
            |--------------------------------------------------------------------------
            | HAPUS FOTO LAMA
            |--------------------------------------------------------------------------
            */

            if (
                $user->profile_photo &&
                Storage::disk('public')->exists(
                    $user->profile_photo
                )
            ) {
                Storage::disk('public')->delete(
                    $user->profile_photo
                );
            }

            /*
            |--------------------------------------------------------------------------
            | SIMPAN FOTO BARU
            |--------------------------------------------------------------------------
            */

            $data['profile_photo'] = $request
                ->file('profile_photo')
                ->store('profile', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE USER
        |--------------------------------------------------------------------------
        */

        $user->update($data);

        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('customer.account')
            ->with(
                'success',
                'Profil berhasil diperbarui.'
            );
    }
}