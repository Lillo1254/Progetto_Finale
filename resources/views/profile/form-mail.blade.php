<x-layout> 
 
  <form action="{{ route('revisor.request') }}" method="POST">
    @csrf
    <input type="hidden" name="is_revisor" value="1">
    <button type="submit" class="btn btn-primary">
        Richiedi di diventare revisore
    </button>
</form>

 
 </x-layout>