<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\OrderDetail;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, Book $book)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string|max:1000',
        ]);

        // Cek apakah user pernah membeli buku ini
        // dan order sudah completed
        $pernahBeli = OrderDetail::where('book_id', $book->id)
            ->whereHas('order', function ($query) {
                $query->where('user_id', Auth::id())
                    ->where('status', 'completed');
            })
            ->exists();

        if (!$pernahBeli) {
            return back()->with(
                'error',
                'Anda hanya dapat memberikan ulasan setelah membeli buku ini.'
            );
        }

        // Cek apakah user sudah pernah memberikan review
        $sudahReview = Review::where('user_id', Auth::id())
            ->where('book_id', $book->id)
            ->exists();

        if ($sudahReview) {
            return back()->with(
                'error',
                'Anda sudah memberikan ulasan untuk buku ini.'
            );
        }

        // Simpan review
        Review::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ]);

        return back()->with(
            'success',
            'Terima kasih! Ulasan berhasil dikirim.'
        );
    }
}