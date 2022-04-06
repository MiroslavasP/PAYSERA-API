<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class OutfitStoreController extends Controller
{
    public function showList()
    {
        $data = Http::acceptJson()->get('http://localhost/books_story/public/api/outfits')->json();

        $data = array_map(
            fn ($b) => (object) $b,
            $data['data']
        );

        $outfits = collect($data)->sortBy('type');

        return view('outfit_store.list', ['outfits' => $outfits]);
    }


    public function showOutfit($id)
    {
        $data = Http::acceptJson()->get('http://localhost/books_story/public/api/outfit/show' . $id . '?one')->json();

        $outfit = (object) $data['data'][0];

        foreach ($outfit->photos as &$photo) {
            $photo = (object) $photo;
        }

        foreach ($outfit->tags as &$tag) {
            $tag = (object) $tag;
        }


        return view('outfit_store.one', ['outfit' => $outfit]);
    }
}
