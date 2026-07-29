<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{

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
        ->route('books.index')
        ->with('success','Buku berhasil dihapus');


    }


}
