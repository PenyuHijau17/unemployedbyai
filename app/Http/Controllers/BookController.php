<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * ==============================
     * ADMIN - DAFTAR BUKU
     * ==============================
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $books = Book::with('category')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('judul', 'like', '%' . $search . '%')
                        ->orWhere('penulis', 'like', '%' . $search . '%')
                        ->orWhere('penerbit', 'like', '%' . $search . '%');
                });
            })
            ->latest()
            ->get();

        return view('books.index', compact('books'));
    }


    /**
     * ==============================
     * ADMIN - FORM TAMBAH BUKU
     * ==============================
     */
    public function create()
    {
        $categories = Category::all();

        return view('books.create', compact('categories'));
    }


    /**
     * ==============================
     * ADMIN - SIMPAN BUKU
     * ==============================
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'  => 'required',
            'judul'        => 'required',
            'penulis'      => 'required',
            'penerbit'     => 'required',
            'tahun_terbit' => 'required',
            'harga'        => 'required|numeric',
            'stok'         => 'required|integer',
            'deskripsi'    => 'nullable',
            'gambar'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'category_id'  => $request->category_id,
            'judul'        => $request->judul,
            'penulis'      => $request->penulis,
            'penerbit'     => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'harga'        => $request->harga,
            'stok'         => $request->stok,
            'deskripsi'    => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request
                ->file('gambar')
                ->store('books', 'public');
        }

        Book::create($data);

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }


    /**
     * ==============================
     * ADMIN - DETAIL BUKU
     * ==============================
     */
    public function show(Book $book)
    {
        $book->load('category');

        return view('books.show', compact('book'));
    }


    /**
     * ==============================
     * ADMIN - FORM EDIT BUKU
     * ==============================
     */
    public function edit(Book $book)
    {
        $categories = Category::all();

        return view(
            'books.edit',
            compact('book', 'categories')
        );
    }


    /**
     * ==============================
     * ADMIN - UPDATE BUKU
     * ==============================
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'category_id'  => 'required',
            'judul'        => 'required',
            'penulis'      => 'required',
            'penerbit'     => 'required',
            'tahun_terbit' => 'required',
            'harga'        => 'required|numeric',
            'stok'         => 'required|integer',
            'deskripsi'    => 'nullable',
            'gambar'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'category_id'  => $request->category_id,
            'judul'        => $request->judul,
            'penulis'      => $request->penulis,
            'penerbit'     => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'harga'        => $request->harga,
            'stok'         => $request->stok,
            'deskripsi'    => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            if ($book->gambar) {
                Storage::disk('public')->delete($book->gambar);
            }

            // Simpan gambar baru
            $data['gambar'] = $request
                ->file('gambar')
                ->store('books', 'public');
        }

        $book->update($data);

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }


    /**
     * ==============================
     * ADMIN - HAPUS BUKU
     * ==============================
     */
    public function destroy(Book $book)
    {
        if ($book->gambar) {
            Storage::disk('public')->delete($book->gambar);
        }

        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil dihapus.');
    }


    /**
     * ==============================
     * CUSTOMER - KOLEKSI BUKU
     * ==============================
     */
    public function customerIndex(Request $request)
    {
        $search = $request->search;
        $category = $request->category;


        /*
        |--------------------------------------------------------------------------
        | BUKU TERLARIS
        |--------------------------------------------------------------------------
        | Menghitung jumlah buku yang benar-benar terjual.
        |
        | Status:
        | - completed
        | - selesai
        |
        | Dua status dipakai karena database kamu saat ini
        | memang mempunyai kedua jenis status tersebut.
        |--------------------------------------------------------------------------
        */

        $bestSellers = Book::with('category')
            ->withSum([
                'orderDetails as total_sold' => function ($query) {
                    $query->whereHas('order', function ($orderQuery) {
                        $orderQuery->whereIn('status', [
                            'completed',
                            'selesai'
                        ]);
                    });
                }
            ], 'jumlah')
            ->orderByDesc('total_sold')
            ->orderBy('id')
            ->take(3)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | SEMUA BUKU
        |--------------------------------------------------------------------------
        */

        $books = Book::with('category')
            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where('judul', 'like', '%' . $search . '%')
                        ->orWhere('penulis', 'like', '%' . $search . '%')
                        ->orWhere('penerbit', 'like', '%' . $search . '%');

                });

            })
            ->when($category, function ($query) use ($category) {

                $query->where('category_id', $category);

            })
            ->latest()
            ->get();


        /*
        |--------------------------------------------------------------------------
        | SEMUA KATEGORI
        |--------------------------------------------------------------------------
        */

        $categories = Category::all();


        /*
        |--------------------------------------------------------------------------
        | VIEW CUSTOMER
        |--------------------------------------------------------------------------
        |
        | File:
        | resources/views/books/customer.blade.php
        |
        */

        return view('books.customer', compact(
            'books',
            'categories',
            'bestSellers'
        ));
    }


    /**
     * ==============================
     * CUSTOMER - DETAIL BUKU
     * ==============================
     */
    public function customerShow(Book $book)
    {
        $book->load('category');

        return view(
            'books.customer-show',
            compact('book')
        );
    }
}