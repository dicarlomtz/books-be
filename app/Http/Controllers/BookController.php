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
        return Book::latest()->paginate(20);
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
        $search_parameter = $request->query('search_parameter');
        $parameter_value =$request->query('parameter_value');

        if ($search_parameter == 'authors' ||
            $search_parameter == 'co_authors') return Book::whereJsonContains($search_parameter, $parameter_value)->paginate(20);
        return Book::where($search_parameter, 'like', '%' . $parameter_value . '%')->paginate(20);
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
