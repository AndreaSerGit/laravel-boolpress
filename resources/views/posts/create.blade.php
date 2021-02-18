@extends('layout.main')

@section('header')
  <h1>Nuovo Post</h1>    
@endsection

@section('content')

   @if ($errors->any())
     <div class="alert alert-danger">
         <ul>
             @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>     
             @endforeach

         </ul>
     </div>
       
   @endif


  <form action=" {{ route('posts.store') }}" method="POST">
    @csrf
    @method('POST')
      <div class="form-group">
        <label for="titolo">Titolo</label>
        <input type="text" class="form-control" name="titolo" id="titolo" placeholder="titolo">
      </div>
      <div class="form-group">
        <label for="testo">testo</label>
        <input type="text" class="form-control" name="testo" id="testo" placeholder="testo">
      </div>
      <div class="form-group">
        <label for="autore">Autore</label>
        <input type="text" class="form-control" name="autore" id="autore" placeholder="Autore">
      </div>
      <div class="form-group">
        <label for="foto">Foto</label>
        <input type="text" class="form-control" name="foto" id="foto" placeholder="Url">
      </div>
      <div class="form-group">
        <label for="data_pubblicazione">Data pubblicazione</label>
        <input type="date" class="form-control" name="data_pubblicazione" id="data_pubblicazione" placeholder="Data pubblicazione">
      </div>
      <button type='submit' class="btn btn-primary">Invia Post</button>
      <a href="{{route('posts.index')}}"> < Torna alla Home</a>   
  </form>
    
@endsection
