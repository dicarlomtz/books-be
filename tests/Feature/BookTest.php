<?php

use App\Models\Book;

use function Pest\Laravel\get;
use function Pest\Laravel\put;
use function Pest\Laravel\post;
use function Pest\Laravel\delete;

it('returns a paginated list of books', function () {
    $this->withoutExceptionHandling();

    $response = get(route('books'));

    $response->assertStatus(200);
});

it('stores a book', function () {
    $this->withoutExceptionHandling();

    $book = Book::factory()->raw();
    $response = post(route('books.store'), $book);

    $bookStored = $response->json()['book'];
    unset($bookStored['id']);
    unset($bookStored['created_at']);
    unset($bookStored['updated_at']);

    $response->assertStatus(200);
    $this->assertEquals($book, $bookStored);
});

it('removes a book', function () {
    $this->withoutExceptionHandling();

    $book = Book::factory()->raw();
    $response = post(route('books.store'), $book);

    $bookStored = $response->json()['book'];
    $response = delete(route('books.destroy', ['id' => $bookStored['id']]));

    $response->assertStatus(200);
    $this->assertEquals($bookStored, $response->json()['book']);
});

it('updates a book', function () {
    $this->withoutExceptionHandling();

    $book = Book::factory()->raw();
    $response = post(route('books.store'), $book);

    $bookStored = $response->json()['book'];
    $bookStored['title'] = 'Title updated';
    unset($bookStored['updated_at']);

    $response = put(route('books.update', ['id' => $bookStored['id']]), $bookStored);
    $bookUpdated = $response->json()['book'];
    unset($bookUpdated['updated_at']);

    $response->assertStatus(200);
    $this->assertEquals($bookStored, $bookUpdated);
});

it('searches a book by id', function () {
    $this->withoutExceptionHandling();

    $book = Book::factory()->raw();
    $response = post(route('books.store'), $book);

    $bookStored = $response->json()['book'];
    $response = get(route('books.show', ['id' => $bookStored['id']]));

    $response->assertStatus(200);
    $this->assertEquals($bookStored, $response->json()['book']);
});

it('searches books by a given parameter and value', function () {
    $this->withoutExceptionHandling();

    $response = get(route('books.search', ['search_parameter' => 'published_year', 'parameter_value' => '2020']));

    $response->assertStatus(200);
});

