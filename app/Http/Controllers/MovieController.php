<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    private $movies = [];

    public function __construct()
    {
        // $this->middleware('isAuth');
        // $this->middleware('isMember')->only(['show']);
        $this->movies = [
            [
                'title' => 'Attack on Titan',
                'description' => 'Eren Yeager vows to eliminate the Titans after a devastating attack on his hometown.',
                'release_date' => '2013-04-06',
                'characters' => ['Eren Yeager', 'Mikasa Ackerman', 'Armin Arlert'],
                'genres' => ['Action', 'Drama', 'Fantasy'],
                'image' => 'https://m.media-amazon.com/images/M/MV5BNjY4MDQxZTItM2JjMi00NjM5LTk0MWYtOTBlNTY2YjBiNmFjXkEyXkFqcGc@._V1_.jpg',
            ],
            [
                'title' => 'Naruto',
                'description' => 'A young ninja strives to gain recognition and become the Hokage of his village.',
                'release_date' => '2002-10-03',
                'characters' => ['Naruto Uzumaki', 'Sasuke Uchiha', 'Sakura Haruno'],
                'genres' => ['Action', 'Adventure'],
                'image' => 'https://m.media-amazon.com/images/M/MV5BZTNjOWI0ZTAtOGY1OS00ZGU0LWEyOWYtMjhkYjdlYmVjMDk2XkEyXkFqcGc@._V1_.jpg',
            ],
            [
                'title' => 'One Piece',
                'description' => 'Monkey D. Luffy sets out on a journey to find the legendary treasure, One Piece.',
                'release_date' => '1999-10-20',
                'characters' => ['Monkey D. Luffy', 'Roronoa Zoro', 'Nami'],
                'genres' => ['Adventure', 'Fantasy', 'Action'],
                'image' => 'https://m.media-amazon.com/images/M/MV5BMTNjNGU4NTUtYmVjMy00YjRiLTkxMWUtNzZkMDNiYjZhNmViXkEyXkFqcGc@._V1_.jpg',
            ],
            [
                'title' => 'Demon Slayer',
                'description' => 'Tanjiro Kamado becomes a demon slayer to avenge his family and cure his sister.',
                'release_date' => '2019-04-06',
                'characters' => ['Tanjiro Kamado', 'Nezuko Kamado', 'Zenitsu Agatsuma'],
                'genres' => ['Action', 'Adventure', 'Supernatural'],
                'image' => 'https://m.media-amazon.com/images/M/MV5BMWU1OGEwNmQtNGM3MS00YTYyLThmYmMtN2FjYzQzNzNmNTE0XkEyXkFqcGc@._V1_.jpg',
            ],
            [
                'title' => 'My Hero Academia',
                'description' => 'Izuku Midoriya trains to become a hero in a world where superpowers, called Quirks, are the norm.',
                'release_date' => '2016-04-03',
                'characters' => ['Izuku Midoriya', 'Katsuki Bakugo', 'All Might'],
                'genres' => ['Action', 'Comedy', 'Drama'],
                'image' => 'https://m.media-amazon.com/images/M/MV5BODIyMTNmOTYtYjhhMS00ZWE3LWFhNWEtM2E4NWM1YjdmODEzXkEyXkFqcGc@._V1_.jpg',
            ],
            [
                'title' => 'Fullmetal Alchemist: Brotherhood',
                'description' => 'The Elric brothers search for the Philosopher\'s Stone to restore their bodies.',
                'release_date' => '2009-04-05',
                'characters' => ['Edward Elric', 'Alphonse Elric', 'Roy Mustang'],
                'genres' => ['Adventure', 'Drama', 'Fantasy'],
                'image' => 'https://m.media-amazon.com/images/M/MV5BMzNiODA5NjYtYWExZS00OTc4LTg3N2ItYWYwYTUyYmM5MWViXkEyXkFqcGc@._V1_.jpg',
            ],
            [
                'title' => 'Sword Art Online',
                'description' => 'Players trapped in a virtual reality MMORPG must clear all levels to escape.',
                'release_date' => '2012-07-07',
                'characters' => ['Kirito', 'Asuna Yuuki', 'Sinon'],
                'genres' => ['Action', 'Adventure', 'Sci-Fi'],
                'image' => 'https://m.media-amazon.com/images/M/MV5BN2NhYzU2NDEtYzI1NS00MjgzLThjZGUtOTYxNGJkZjZmNDdjXkEyXkFqcGc@._V1_.jpg',
            ],
            [
                'title' => 'Death Note',
                'description' => 'Light Yagami discovers a notebook that allows him to kill anyone by writing their name in it.',
                'release_date' => '2006-10-04',
                'characters' => ['Light Yagami', 'L', 'Misa Amane'],
                'genres' => ['Mystery', 'Psychological', 'Supernatural'],
                'image' => 'https://m.media-amazon.com/images/M/MV5BYWI3Y2U4NGYtNGZmNS00OWJhLThiMWYtOTkyNzk1NTBhYjViXkEyXkFqcGc@._V1_.jpg',
            ],
            [
                'title' => 'Hunter x Hunter',
                'description' => 'Gon Freecss sets out to become a Hunter and find his missing father.',
                'release_date' => '2011-10-02',
                'characters' => ['Gon Freecss', 'Killua Zoldyck', 'Kurapika'],
                'genres' => ['Adventure', 'Action', 'Fantasy'],
                'image' => 'https://m.media-amazon.com/images/M/MV5BMjM2YjBlZDEtYWUxYi00ZGE2LTk0ZjctNWI0ZDY4MWUwYTU2XkEyXkFqcGc@._V1_.jpg',
            ],
            [
                'title' => 'Tokyo Ghoul',
                'description' => 'Ken Kaneki becomes a half-ghoul after a chance encounter and must navigate his new life.',
                'release_date' => '2014-07-04',
                'characters' => ['Ken Kaneki', 'Touka Kirishima', 'Rize Kamishiro'],
                'genres' => ['Action', 'Drama', 'Horror'],
                'image' => 'https://m.media-amazon.com/images/M/MV5BZWI2NzZhMTItOTM3OS00NjcyLThmN2EtZGZjMjlhYWMwODMzXkEyXkFqcGc@._V1_.jpg',
            ],
        ];
    }

    public function index()
    {
        $movies = $this->movies;

        return view('movies.index', compact('movies'))->with([
            'titlePage' => 'Movie List'
        ]);
    }

    public function create(){
        return view('movies.create');
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
