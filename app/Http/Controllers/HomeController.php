<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        // return response(request()->all);
        $user =[
            'name' => 'Dhimas',
            'email' => 'asd@gmail.com',
            'role' => ''
        ];

        $movies = [
            ['title' => 'The Matrix', 'year' => 1999],
            ['title' => 'Inception', 'year' => 1997],
            ['title' => 'The Intereptor', 'year' => 1998],
            ['title' => 'The Dark Night', 'year' => 1995],
            ['title' => 'The Dark', 'year' => 2004],
            ['title' => 'The Night', 'year' => 2005],
            ['title' => 'Conan', 'year' => 2006],
            ['title' => 'Naruto', 'year' => 2007],
        ];
        return view('home', compact('user','movies'));
    }
}
