<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    // HOME CUSTOMER
    public function index()
    {
        return view('home.index');
    }



    // CUSTOMER JELAJAH BUKU
    public function books(Request $request)
    {

        $search = $request->search;


        $books = Book::with('category')

            ->when($search, function($query) use ($search){

                $query->where('judul','like','%'.$search.'%')
                ->orWhere('penulis','like','%'.$search.'%')
                ->orWhere('penerbit','like','%'.$search.'%');

            })

            ->get();



        return view(
            'books.customer',
            compact('books')
        );

    }

}