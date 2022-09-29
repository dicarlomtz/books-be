<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Requests\SearchBookRequest;
use App\Models\Book;

class BookController extends Controller
{

    public function index()
    {
        return Book::latest()->paginate(6);
    }

    public function store(StoreBookRequest $request)
    {
        $book = Book::create($request->all());
        return response(['message' => 'Book created', 'book' => $book]);
    }

    public function show($id)
    {
        $book = Book::find($id);
        if(!$book) return response(['message' => 'Book not found'], 404);

        return response(['message' => 'Book found', 'book' => $book]);
    }

    public function search(SearchBookRequest $request)
    {
        $search_value= $request->query('search_value');
        $available = $request->query('available');

        if ($search_value) {
            $search_parameter = '%' . $search_value . '%';

            $query = Book::where(function ($query) use ($search_parameter, $search_value) {
                $query->orWhereJsonContains('authors', $search_value)
                    ->orWhereJsonContains('co_authors', $search_value)
                    ->orWhere('title', 'like', $search_parameter)
                    ->orWhere('published_year', 'like', $search_parameter); });
        }

        if ($search_value) {
            if ($available != null) $query->where('available', '=', $available);
        }

        if (!$search_value) {
            if ($available != null) $query = Book::where('available', '=', $available);
        }



        return $query->paginate(6);
    }

    public function update(UpdateBookRequest $request, $id)
    {
        $book = Book::find($id);
        if(!$book) return response(['message' => 'Book not found'], 404);

        $book->update($request->all());
        return response(['message' => 'Book updated', 'book' => $book]);
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        if (!$book) return response(['message' => 'Book not found'], 404);

        $book->delete();
        return response(['message' => 'Book deleted', 'book' => $book]);
    }
}
