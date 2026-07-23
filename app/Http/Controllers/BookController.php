<?php

namespace App\Http\Controllers;


use App\Models\Book;
use App\Models\Category;

use Illuminate\Http\Request;


class BookController extends Controller
{


    public function index()
    {
        $books = Book::with('category')->get();

        return view('books.index', compact('books'));
    }



    public function create()
    {

        $categories = Category::all();

        return view('books.create', compact('categories'));

    }




    public function store(Request $request)
    {

        $request->validate([

            'category_id'=>'required',

            'judul'=>'required',

            'penulis'=>'required',

            'penerbit'=>'required',

            'tahun_terbit'=>'required',

            'harga'=>'required',

            'stok'=>'required'

        ]);



        Book::create($request->all());


        return redirect()
        ->route('books.index')
        ->with('success','Buku berhasil ditambahkan');

    }





    public function show(Book $book)
    {

        return view('books.show',compact('book'));

    }




    public function edit(Book $book)
    {

        $categories = Category::all();


        return view(
            'books.edit',
            compact('book','categories')
        );

    }





    public function update(Request $request, Book $book)
    {


        $book->update($request->all());


        return redirect()
        ->route('books.index');

    }





    public function destroy(Book $book)
    {

        $book->delete();


        return redirect()
        ->route('books.index');

    }


}