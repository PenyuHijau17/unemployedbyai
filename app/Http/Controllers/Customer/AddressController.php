<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{

    public function index()
    {
        $addresses = Auth::user()
            ->addresses()
            ->latest()
            ->get();

        return view('customer.address.index', compact('addresses'));
    }


    public function create()
    {
        return view('customer.address.create');
    }


    public function store(Request $request)
    {

        $request->validate([

            'nama_penerima' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',

        ]);


        Auth::user()->addresses()->create([

            'nama_penerima'=>$request->nama_penerima,

            'no_hp'=>$request->no_hp,

            'alamat'=>$request->alamat,

            'kota'=>$request->kota,

            'provinsi'=>$request->provinsi,

            'kode_pos'=>$request->kode_pos,

            'utama'=>false,

        ]);


        return redirect()
            ->route('customer.address.index')
            ->with('success','Alamat berhasil ditambahkan');

    }

public function setPrimary(Address $address)
{
    $user = auth()->user();


    // matikan alamat utama sebelumnya

    $user->addresses()
        ->update([
            'utama'=>false
        ]);



    // jadikan alamat ini utama

    $address->update([
        'utama'=>true
    ]);



    return redirect()
        ->route('customer.address.index')
        ->with('success','Alamat utama berhasil diubah');

}

    public function destroy(Address $address)
    {

        $address->delete();


        return redirect()
            ->route('customer.address.index')
            ->with('success','Alamat berhasil dihapus');

    }

}