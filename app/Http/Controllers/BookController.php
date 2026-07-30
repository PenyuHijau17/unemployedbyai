<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * ADMIN - Menampilkan semua buku
     */
    public function index()
    {
        $books = Book::with('category')->latest()->get();

        return view('admin.books.index', compact('books'));
    }

    /**
     * ADMIN - Form tambah buku
     */


    // ==========================
    // ADMIN LIST BOOK
    // ==========================

    public function index(Request $request)
    {

        $search = $request->search;


        $books = Book::with('category')

            ->when($search, function ($query) use ($search) {

                $query->where('judul','like','%'.$search.'%')
                    ->orWhere('penulis','like','%'.$search.'%')
                    ->orWhere('penerbit','like','%'.$search.'%');

            })

            ->get();



        return view('books.index', compact('books'));

    }




    // ==========================
    // CUSTOMER LIST BOOK
    // ==========================

    public function customerIndex(Request $request)
    {


        $search = $request->search;


        $books = Book::with('category')

            ->when($search, function($query) use ($search){

                $query->where('judul','like','%'.$search.'%')
                ->orWhere('penulis','like','%'.$search.'%');

            })

            ->get();



        return view(
            'books.customer',
            compact('books')
        );

    }




    // ==========================
    // CUSTOMER DETAIL BOOK
    // ==========================

    public function customerShow(Book $book)
    {

        return view(
            'books.customer-show',
            compact('book')
        );

    }




    // ==========================
    // ADMIN CREATE
    // ==========================


    public function create()
    {

        $categories = Category::all();


        return view('admin.books.create', compact('categories'));
    }

    /**
     * ADMIN - Simpan buku
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id'   => 'required|exists:categories,id',
            'judul'         => 'required|string|max:255',
            'penulis'       => 'required|string|max:255',
            'penerbit'      => 'required|string|max:255',
            'tahun_terbit'  => 'required|integer|min:1900|max:' . date('Y'),
            'harga'         => 'required|numeric|min:0',
            'stok'          => 'required|integer|min:0',
            'gambar'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'deskripsi'     => 'nullable|string',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('books', 'public');
        }

        Book::create($validated);

        return view(
            'books.create',
            compact('categories')
        );

    }





    // ==========================
    // ADMIN STORE
    // ==========================

    public function store(Request $request)
    {


        $request->validate([

            'category_id'=>'required',
            'judul'=>'required',
            'penulis'=>'required',
            'penerbit'=>'required',
            'tahun_terbit'=>'required',
            'harga'=>'required|numeric',
            'stok'=>'required|integer',
            'deskripsi'=>'nullable',
            'gambar'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);



        $data=$request->all();



        if($request->hasFile('gambar')){


            $data['gambar'] =
            $request->file('gambar')
            ->store('books','public');


        }



        Book::create($data);




        return redirect()

            ->route('admin.books.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * ADMIN - Detail buku
     */
    public function show(Book $book)
    {
        $book->load('category');

        return view('admin.books.show', compact('book'));
    }

    /**
     * ADMIN - Form edit
     */
        ->route('books.index')
        ->with('success','Buku berhasil ditambahkan');


    }





    // ==========================
    // ADMIN SHOW
    // ==========================

    public function show(Book $book)
    {

        return view(
            'books.show',
            compact('book')
        );

    }





    // ==========================
    // ADMIN EDIT
    // ==========================


    public function edit(Book $book)
    {


        $categories = Category::all();


        return view('admin.books.edit', compact('book', 'categories'));
    }

    /**
     * ADMIN - Update buku
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'category_id'   => 'required|exists:categories,id',
            'judul'         => 'required|string|max:255',
            'penulis'       => 'required|string|max:255',
            'penerbit'      => 'required|string|max:255',
            'tahun_terbit'  => 'required|integer|min:1900|max:' . date('Y'),
            'harga'         => 'required|numeric|min:0',
            'stok'          => 'required|integer|min:0',
            'gambar'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'deskripsi'     => 'nullable|string',
        ]);

        if ($request->hasFile('gambar')) {

            if ($book->gambar && Storage::disk('public')->exists($book->gambar)) {
                Storage::disk('public')->delete($book->gambar);
            }

            $validated['gambar'] = $request->file('gambar')->store('books', 'public');
        }

        $book->update($validated);


        return view(
            'books.edit',
            compact(
                'book',
                'categories'
            )
        );


    }





    // ==========================
    // ADMIN UPDATE
    // ==========================

    public function update(Request $request, Book $book)
    {


        $request->validate([

            'category_id'=>'required',
            'judul'=>'required',
            'penulis'=>'required',
            'penerbit'=>'required',
            'tahun_terbit'=>'required',
            'harga'=>'required|numeric',
            'stok'=>'required|integer',
            'deskripsi'=>'nullable',
            'gambar'=>'nullable|image|mimes:jpg,jpeg,png,webp,heic|max:2048',

        ]);



        $data=$request->all();



        if($request->hasFile('gambar')){


            if($book->gambar &&
            Storage::disk('public')->exists($book->gambar)){


                Storage::disk('public')
                ->delete($book->gambar);


            }



            $data['gambar'] =
            $request->file('gambar')
            ->store('books','public');


        }



        $book->update($data);




        return redirect()

            ->route('admin.books.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }

    /**
     * ADMIN - Hapus buku
     */
    public function destroy(Book $book)
    {
        if ($book->gambar && Storage::disk('public')->exists($book->gambar)) {
            Storage::disk('public')->delete($book->gambar);
        ->route('books.index')
        ->with('success','Buku berhasil diperbarui');


    }





    // ==========================
    // ADMIN DELETE
    // ==========================

    public function destroy(Book $book)
    {


        if($book->gambar &&
        Storage::disk('public')->exists($book->gambar)){


            Storage::disk('public')
            ->delete($book->gambar);



        }



        $book->delete();



        return redirect()

            ->route('admin.books.index')
            ->with('success', 'Buku berhasil dihapus.');
    }

    /**
     * CUSTOMER - Daftar buku
     */
    public function customerIndex()
    {
        $books = Book::with('category')
            ->where('stok', '>', 0)
            ->latest()
            ->get();

        return view('books.index', compact('books'));
    }

    /**
     * CUSTOMER - Detail buku
     */
    public function customerShow(Book $book)
    {
        $book->load('category');

        return view('books.show', compact('book'));
    }
}

        ->route('books.index')
        ->with('success','Buku berhasil dihapus');


    }


}