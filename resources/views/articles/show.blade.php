<x-layout> 
 

 <h1>Dettagli articolo {{ $article->title }}</h1>
 <h2>Inserito da:</h2>
 <h5>{{ $article->user->name }}</h5>
 <p>{{ $article->description }}</p>
 
 <p>Prezzo: € {{ $article->price }} ;</p> 
 
 </x-layout>