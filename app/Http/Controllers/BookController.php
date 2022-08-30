<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Book::latest()->paginate(20);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $book = Book::create($request->all());
        return response(['message' => 'Book created', 'book' => $book]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        if(!$book)
        {
            return response(['message' => 'Book not found'], 404);
        }

        return response(['message' => 'Book found', 'book' => $book]);
    }

    /**
     * It searches for a book based on the search criteria and the parameter
     * 
     * @param search_criteria the column name in the database
     * @param parameter The parameter to search for.
     * 
     * @return A paginated collection of books that match the search criteria.
     */
    public function search($search_criteria, $parameter)
    {
        if ($search_criteria == 'authors' || $search_criteria == 'co_authors')
            return Book::whereJsonContains($search_criteria, $parameter)->paginate(20);
        return Book::where($search_criteria, 'like', '%' . $parameter . '%')->paginate(20);
    }

    /**
     * It returns the cover image of the book with the given id
     * 
     * @param id The id of the book we want to get the cover image for.
     * 
     * @return A file
     */
    public function image($id)
    {
        $book = Book::find($id);
        if(!$book)
        {
            return response(['message' => 'Book not found'], 404);
        }

        $coverImagePath = public_path('cover-images') . '/' . $book->cover_image;

        return response()->file($coverImagePath);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, $id)
    {
        $book = Book::find($id);
        if(!$book)
        {
            return response(['message' => 'Book not found'], 404);
        }

        $book->update($request->all());
        return response(['message' => 'Book updated', 'book' => $book]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        if (!$book)
        {
            return response(['message' => 'Book not found'], 404);
        }

        $book->delete();
        return response(['message' => 'Book deleted', 'book' => $book]);
    }
}
