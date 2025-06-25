<x-layout> 
 
  <form action="{{ route('revisor.request') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary">
        Richiedi di diventare revisore
    </button>
</form>

 
 </x-layout>