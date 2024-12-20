<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public $movies;

    public function __construct()
    {
        // $this->middleware('isAuth');
        // $this->middleware('isMember')->only(['show']);

        for ($i = 0; $i < 10; $i++) {
            $this->movies[] = [
                'title' => 'Title' . $i,
                'year' => '2024',
                'genre' => 'Action'
            ];
        }
    }

    public function index()
    {
        // return response()->json([
        //     'movies' => $this->movies,
        //     'message' => 'List of movies',
        // ], 200);

        $movies = $this->movies;

        // return view('movies.index', ['movies' => $movies]);
        return view('movies.index', compact('movies'))->with([
            'titlePage' => 'Movie List'
        ]);
    }

    public function show($id)
    {
        $movie = $this->movies[$id];
        return view('movies.show', ['movie' => $movie]);
    }

    public function store()
    {

        $duplicates = collect($this->movies)->firstWhere('title', request('title'));

        if ($duplicates) {
            return response()->json([
                'message' => 'Duplicate movies found',
                'duplicates' => $duplicates
            ], 400);
        }

        $this->movies[] = [
            'title' => request('title'),
            'year' => request('year'),
            'genre' => request('genre')
        ];

        return response()->json([
            'message' => 'No duplicates',
            'data_movies' => $this->movies
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $this->movies[$id]['title'] = $request->title;
        $this->movies[$id]['year'] = $request->year;
        $this->movies[$id]['genre'] = $request->genre;

        return $this->movies;
    }

    public function destroy($id)
    {
        unset($this->movies[$id]);

        return $this->movies;
    }
}
