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

        // Jika ini alamat pertama, otomatis menjadi alamat utama
        $isFirstAddress = Auth::user()->addresses()->count() === 0;

        Auth::user()->addresses()->create([
            'nama_penerima' => $request->nama_penerima,
            'no_hp'         => $request->no_hp,
            'alamat'        => $request->alamat,
            'kota'          => $request->kota,
            'provinsi'      => $request->provinsi,
            'kode_pos'      => $request->kode_pos,
            'utama'         => $isFirstAddress,
        ]);

        return redirect()
            ->route('customer.address.index')
            ->with('success', 'Alamat berhasil ditambahkan');
    }

    public function setPrimary(Address $address)
    {
        $user = Auth::user();

        // Pastikan alamat milik user yang sedang login
        if ($address->user_id !== $user->id) {
            abort(403);
        }

        // Nonaktifkan semua alamat utama milik user
        $user->addresses()->update([
            'utama' => false,
        ]);

        // Jadikan alamat yang dipilih sebagai alamat utama
        $address->update([
            'utama' => true,
        ]);

        // Langsung kembali ke halaman checkout
        return redirect()
            ->route('checkout.index')
            ->with('success', 'Alamat utama berhasil diubah');
    }

    public function destroy(Address $address)
    {
        $address->delete();

        return redirect()
            ->route('customer.address.index')
            ->with('success', 'Alamat berhasil dihapus');
    }
}