<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $totalOrders = $user->orders()->count();

        $processing = $user->orders()
            ->whereIn('status', ['processing', 'packed'])
            ->count();

        $shipped = $user->orders()
            ->where('status', 'shipped')
            ->count();

        $completed = $user->orders()
            ->where('status', 'completed')
            ->count();

        return view('customer.account.index', compact(
            'user',
            'totalOrders',
            'processing',
            'shipped',
            'completed'
        ));
    }

    public function edit()
{
    $user = auth()->user();

    return view('customer.account.edit', compact('user'));
}


public function update(Request $request)
{
    $request->validate([
        'name'=>'required',
        'email'=>'required|email'
    ]);


    $user = auth()->user();


    $user->update([
        'name'=>$request->name,
        'email'=>$request->email
    ]);


    return redirect()
        ->route('customer.account')
        ->with('success','Profil berhasil diperbarui');

}
}