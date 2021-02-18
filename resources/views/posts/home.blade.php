@extends('layout.main')


@section('header')
<h1>Tutti i Post</h1>
@endsection

@section('content')
@if (session('message'))
<div class="alert alert-success">
{{ session('message') }}
</div>     
@endif

<table class="table  table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titolo</th>
            <th>Testo</th>
            <th>Autore</th>
            <th>Foto</th>
            <th>Data pubblicazione</th>
            <th><th> <a href="{{route ("posts.create") }}" class="btn btn-outline-dark">Nuovo post</a> </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td> {{ $post->id }} </td>
            <td> {{ $post->titolo }} </td>
            <td> {{ $post->testo }} </td>
            <td> {{ $post->autore }} </td>
            <td> <img src="{{ $post->foto }}" alt=""> </td>
            <td> {{ $post->data_pubblicazione }} </td>
            <td>
                <a href=" {{ route('posts.show', $post->id)}} " class="btn btn-outline-dark">MOSTRA</a>
                <a href="{{route ("posts.edit" , $post->id ) }}" class="btn btn-outline-dark">Modifica Post</a>
            </td>
            <td>
                <form action=" {{ route('posts.destroy', $post->id) }} " method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-dark"> 
                       Elimina post
                    </button>
                </form>
            </td>
        </tr>      
        @endforeach
    </tbody>
</table>
@endsection
