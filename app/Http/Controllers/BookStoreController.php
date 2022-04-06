<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class BookStoreController extends Controller
{
    public function showList()
    {
        $data = Http::acceptJson()->get('http://localhost/books_story/public/api/books')->json();

        $data = array_map(
            fn ($b) => (object) $b,
            $data['data']
        );
        $books = collect($data)->sortBy('title');

        return view('book_store.list', ['books' => $books]);
    }

    public function showBook($id)
    {
        $data = Http::acceptJson()->get('http://localhost/books_story/public/api/book/show' . $id . '?one')->json();

        $book = (object) $data['data'][0];

        foreach ($book->photos as &$photo) {
            $photo = (object) $photo;
        }

        foreach ($book->tags as &$tag) {
            $tag = (object) $tag;
        }

        // dd($book);

        return view('book_store.one', ['book' => $book]);
    }
}
