<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        /*
        |--------------------------------------------------------------------------
        | TOTAL PESANAN
        |--------------------------------------------------------------------------
        */

        $totalOrders = $user->orders()->count();


        /*
        |--------------------------------------------------------------------------
        | PENDING
        |--------------------------------------------------------------------------
        */

        $pending = $user->orders()
            ->where('status', 'pending')
            ->count();


        /*
        |--------------------------------------------------------------------------
        | DIPROSES
        |--------------------------------------------------------------------------
        |
        | processing dan packed sama-sama dianggap sedang diproses.
        |
        */

        $processing = $user->orders()
            ->whereIn('status', [
                'processing',
                'packed'
            ])
            ->count();


        /*
        |--------------------------------------------------------------------------
        | DIKIRIM
        |--------------------------------------------------------------------------
        */

        $shipped = $user->orders()
            ->where('status', 'shipped')
            ->count();


        /*
        |--------------------------------------------------------------------------
        | SELESAI
        |--------------------------------------------------------------------------
        |
        | Database kamu sekarang punya dua kemungkinan status:
        |
        | completed
        | selesai
        |
        | Jadi keduanya dihitung sebagai pesanan selesai.
        |
        */

        $completed = $user->orders()
            ->whereIn('status', [
                'completed',
                'selesai'
            ])
            ->count();


        return view('customer.account.index', compact(
            'user',
            'totalOrders',
            'pending',
            'processing',
            'shipped',
            'completed'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT PROFILE
    |--------------------------------------------------------------------------
    */

    public function edit()
    {
        $user = auth()->user();

        return view(
            'customer.account.edit',
            compact('user')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE PROFILE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
        ]);


        $user = auth()->user();


        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);


        return redirect()
            ->route('customer.account')
            ->with(
                'success',
                'Profil berhasil diperbarui'
            );
    }
}