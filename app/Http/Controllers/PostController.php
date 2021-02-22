<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Illuminate\Support\Str;

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

        $tags = Tag::all();

        return view("posts.create" , compact('tags'));
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
        $post->slug = Str::slug($post->titolo);
        $post->testo = $data['testo'];
        $post->autore = $data['autore'];
        $post->foto = $data['foto'];
        $post->data_pubblicazione = $data['data_pubblicazione'];
        $result = $post->save();
        
        if(!empty($data['tags'])) {
            $post->tags()->attach($data["tags"]);
        }

        return redirect()->route('posts.index')->with('message' , 'Il post è stato condiviso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();


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
        $tags = Tag::all();

        return view("posts.edit", compact('post' , 'tags'));
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

        if(empty($data['tags'])) {
            $post->tags()->deteach();
        } else {
            $post->tags()->sync($data["tags"]);
        }

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
