<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
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
            ->get();

        return view('books.index', compact('books'));
    }

    public function customerIndex(Request $request)
    {
        $search = $request->search;
        $category = $request->category;

        $books = Book::with([
            'category',
            'orderDetails',
            'reviews'
        ])
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
            ->get();

        foreach ($books as $book) {

            $book->total_terjual = $book->orderDetails->sum('jumlah');

            $book->average_rating = round(
                $book->reviews->avg('rating') ?? 0,
                1
            );

            $book->total_review = $book->reviews->count();
        }

        $categories = Category::orderBy('nama_kategori')->get();

        return view('books.customer', compact(
            'books',
            'categories'
        ));
    }

    public function customerShow(Book $book)
{
    $book->load([
        'category',
        'reviews.user'
    ]);

    // Hanya hitung buku yang benar-benar sudah selesai dibeli
    $totalTerjual = $book->orderDetails()
        ->whereHas('order', function ($query) {
            $query->where('status', 'selesai');
        })
        ->sum('jumlah');

    // Ambil semua review
    $reviews = $book->reviews()
        ->with('user')
        ->latest()
        ->get();

    // Rating rata-rata
    $averageRating = round($reviews->avg('rating') ?? 0, 1);

    // Jumlah rating
    $totalReview = $reviews->count();

    $canReview = false;

    if (Auth::check()) {

        // User harus pernah membeli buku dengan status selesai
        $canReview = $book->orderDetails()
            ->whereHas('order', function ($query) {
                $query->where('user_id', Auth::id())
                      ->where('status', 'selesai');
            })
            ->exists();

        // Cek apakah user sudah pernah review
        if ($canReview) {

            $sudahReview = Review::where('user_id', Auth::id())
                ->where('book_id', $book->id)
                ->exists();

            $canReview = !$sudahReview;
        }
    }

    return view('books.customer-show', compact(
        'book',
        'totalTerjual',
        'averageRating',
        'totalReview',
        'reviews',
        'canReview'
    ));
}

        public function create()
    {
        $categories = Category::all();

        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('books', 'public');
        }

        Book::create($data);

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil ditambahkan');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $categories = Category::all();

        return view('books.edit', compact(
            'book',
            'categories'
        ));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'category_id' => 'required',
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp,heic|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {

            if (
                $book->gambar &&
                Storage::disk('public')->exists($book->gambar)
            ) {
                Storage::disk('public')->delete($book->gambar);
            }

            $data['gambar'] = $request->file('gambar')
                ->store('books', 'public');
        }

        $book->update($data);

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil diperbarui');
    }

    public function destroy(Book $book)
    {
        if (
            $book->gambar &&
            Storage::disk('public')->exists($book->gambar)
        ) {
            Storage::disk('public')->delete($book->gambar);
        }

        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil dihapus');
    }
}