@extends('layout.main')

@section('header')

  <h1>Dettaglio post</h1>
    <p>Stato Post: {{ $post->infoPost->stato_post }}</p>
    <p>Stato Commenti: {{ $post->infoPost->stato_commenti }}</p>
@endsection

@section('content')
  <table class="table  table-striped table-bordered">
      @foreach ($post->getAttributes() as $key => $value)
        <tr>
            <td><strong>{{ $key }}</strong></td>
            <td>
              {{ $value }}
              @if ($key == 'foto')
                  <img src=" {{ $value }} " alt="">
              @endif
            </td>
        </tr>         
      @endforeach
  </table>

  <a href="{{route('posts.index')}}"> < Torna alla Home</a>   
    
@endsection

  


