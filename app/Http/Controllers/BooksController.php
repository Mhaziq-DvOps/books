<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       // $books=Book::all();
        $books=Book::paginate(1);


        return view('books.index',['books'=>$books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi

        $request->validate([
            'title'=>'required',
            'author'=>'required',
            'page'=>'required',
            'year'=>'required'
        ]);

        //simpan
        Book::create($request->all());


        //redirect to main page
        return redirect()->route('books.index')->with('sucess','book added successfully');


    }

    /**
     * Display the specified resource.
     */

     //fungsi macam edit
    public function show(Book $book)
    {
        //
        return view('books.show',['book'=>$book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
        return view('books.edit',['book'=>$book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //validate

        $request->validate([

            'title'=>'required',
            'author'=>'required',
            'page'=>'required',
            'year'=>'required'

        ]);

        //hanya nak create awal2 je kita buat Book::create($request->all()
        //update
        $book->update($request->all());

        //redirect
        return redirect()->route('books.index')->with('success', 'tpdated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    
     //delete
     public function destroy(Book $book)
    {
        //
        $book->delete();
        redirect()->route('books.index')->with('success', 'books is removed from the list');
    }
}
