<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view("posts.home" , compact('posts')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate(
            [
                'titolo' => 'required|max:30',
                'testo' => 'required|max:3000',
                'autore' => 'required|max:30',
                'foto' => 'required',
                'data_pubblicazione' => 'required|date'

            ]
        );

        $post = new Post();
        $post->titolo = $data['titolo'];
        $post->testo = $data['testo'];
        $post->autore = $data['autore'];
        $post->foto = $data['foto'];
        $post->data_pubblicazione = $data['data_pubblicazione'];
        $result = $post->save();

        return redirect()->route('posts.index')->with('message' , 'Il post è stato condiviso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);


        return view("posts.show" , compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("posts.edit", compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        $request->validate(
            [
                'titolo' => 'required|max:30',
                'testo' => 'required|max:3000',
                'foto' => 'required',
            ]
        ); 
        
        $post->update($data);

        

        return redirect()->route('posts.index')->with('message' , 'Il post' . " $post->titolo " . 'è stato modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('message' , 'Il post è stato eliminato');
    }
}
