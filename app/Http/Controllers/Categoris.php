<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;


use Illuminate\Http\Request;

class Categoris extends Controller
{
    public function index(Request $request)
    {
        // $response = Http::get('https://api.publicapis.org/entries');
        // $responsJson = json_decode($response->body());
        // $categories = [];
        // foreach($responsJson ->entries as $itemDetailItem){
        //     array_push($categories,$itemDetailItem->Category);
        // }
        // dd(array_unique($categories));

        $response = Http::get('https://api.publicapis.org/entries');
        $categories = collect($response->json()['entries'])
            ->pluck('Category')
            ->toArray();

        $unique_array = array_unique($categories);
        return Inertia::render('Categories', ['categories' => $unique_array ]);

    }
}
