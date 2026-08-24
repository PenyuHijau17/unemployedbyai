<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\OrderDetail;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN / UMUM - LIST BUKU
    |--------------------------------------------------------------------------
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


    /*
    |--------------------------------------------------------------------------
    | ADMIN - CREATE
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        $categories = Category::all();

        return view('books.create', compact('categories'));
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - STORE
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'  => 'required|exists:categories,id',
            'judul'        => 'required|string|max:255',
            'penulis'      => 'required|string|max:255',
            'penerbit'     => 'required|string|max:255',
            'tahun_terbit' => 'required',
            'harga'        => 'required|numeric|min:0',
            'stok'         => 'required|integer|min:0',
            'deskripsi'    => 'nullable|string',
            'gambar'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->except('gambar');

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


    /*
    |--------------------------------------------------------------------------
    | ADMIN - SHOW
    |--------------------------------------------------------------------------
    */
    public function show(Book $book)
    {
        $book->load('category');

        return view('books.show', compact('book'));
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - EDIT
    |--------------------------------------------------------------------------
    */
    public function edit(Book $book)
    {
        $categories = Category::all();

        return view('books.edit', compact('book', 'categories'));
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'category_id'  => 'required|exists:categories,id',
            'judul'        => 'required|string|max:255',
            'penulis'      => 'required|string|max:255',
            'penerbit'     => 'required|string|max:255',
            'tahun_terbit' => 'required',
            'harga'        => 'required|numeric|min:0',
            'stok'         => 'required|integer|min:0',
            'deskripsi'    => 'nullable|string',
            'gambar'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            if ($book->gambar && Storage::disk('public')->exists($book->gambar)) {
                Storage::disk('public')->delete($book->gambar);
            }

            $data['gambar'] = $request
                ->file('gambar')
                ->store('books', 'public');
        }

        $book->update($data);

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - DELETE
    |--------------------------------------------------------------------------
    */
    public function destroy(Book $book)
    {
        if ($book->gambar && Storage::disk('public')->exists($book->gambar)) {
            Storage::disk('public')->delete($book->gambar);
        }

        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil dihapus.');
    }


    /*
    |--------------------------------------------------------------------------
    | CUSTOMER - LIST BUKU
    |--------------------------------------------------------------------------
    */
    public function customerIndex(Request $request)
    {
        $search = $request->search;
        $categoryId = $request->category;

        /*
        |--------------------------------------------------------------------------
        | BUKU TERLARIS
        |--------------------------------------------------------------------------
        */

        $bestSellers = Book::with('category')
            ->withSum([
                'orderDetails as total_sold' => function ($query) {
                    $query->whereHas('order', function ($q) {
                        $q->whereIn('status', [
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
            ->when($categoryId, function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->orderByDesc('created_at')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | KATEGORI
        |--------------------------------------------------------------------------
        */

        $categories = Category::all();


        /*
        |--------------------------------------------------------------------------
        | KIRIM SEMUA DATA KE customer.blade.php
        |--------------------------------------------------------------------------
        */

        return view('books.customer', compact(
            'books',
            'categories',
            'bestSellers'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | CUSTOMER - DETAIL BUKU
    |--------------------------------------------------------------------------
    */
    public function customerShow(Book $book)
    {
        /*
        |--------------------------------------------------------------------------
        | CATEGORY
        |--------------------------------------------------------------------------
        */

        $book->load('category');


        /*
        |--------------------------------------------------------------------------
        | REVIEW
        |--------------------------------------------------------------------------
        */

        $reviews = Review::with('user')
            ->where('book_id', $book->id)
            ->latest()
            ->get();


        /*
        |--------------------------------------------------------------------------
        | TOTAL REVIEW
        |--------------------------------------------------------------------------
        */

        $totalReview = $reviews->count();


        /*
        |--------------------------------------------------------------------------
        | AVERAGE RATING
        |--------------------------------------------------------------------------
        */

        $averageRating = $totalReview > 0
            ? round($reviews->avg('rating'), 1)
            : 0;


        /*
        |--------------------------------------------------------------------------
        | TOTAL BUKU TERJUAL
        |--------------------------------------------------------------------------
        */

        $totalTerjual = OrderDetail::where('book_id', $book->id)
            ->whereHas('order', function ($query) {
                $query->whereIn('status', [
                    'completed',
                    'selesai'
                ]);
            })
            ->sum('jumlah');


        /*
        |--------------------------------------------------------------------------
        | CAN REVIEW
        |--------------------------------------------------------------------------
        |
        | Guest:
        | false
        |
        | Login:
        | - harus pernah membeli buku
        | - order harus completed/selesai
        | - belum pernah memberikan review
        |
        */

        $canReview = false;

        if (Auth::check()) {

            $alreadyReviewed = Review::where('user_id', Auth::id())
                ->where('book_id', $book->id)
                ->exists();

            $hasPurchased = OrderDetail::where('book_id', $book->id)
                ->whereHas('order', function ($query) {
                    $query->where('user_id', Auth::id())
                        ->whereIn('status', [
                            'completed',
                            'selesai'
                        ]);
                })
                ->exists();

            $canReview = $hasPurchased && !$alreadyReviewed;
        }


        /*
        |--------------------------------------------------------------------------
        | CATEGORY UNTUK NAVBAR / FILTER
        |--------------------------------------------------------------------------
        */

        $categories = Category::all();


        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view('books.customer-show', compact(
            'book',
            'reviews',
            'totalReview',
            'averageRating',
            'totalTerjual',
            'canReview',
            'categories'
        ));
    }
}