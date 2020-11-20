<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class gitPostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
           'caption' => 'required',
           'image' => ['required', 'image'],
        ]);

//      post request van image opslaan naar de uploads map in de public folder
        dd(request('image')->store('uploads', 'public'));

        auth()->user()->posts()->create($data);

        dd(request()->all());
    }
}
