<x-layout> 

<div class="primary-bg">
  <div class="min-vh-100 container">
    <div class="row justify-content-center py-5">
      <div class="col-12 col-md-10 col-lg-8 text-center">
        <form action="{{ route('revisor.request') }}" method="POST">
          @csrf
          <input type="hidden" name="is_revisor" value="1">
          <button type="submit" class="btn btn-primary">
            Richiedi di diventare revisore
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
 
 </x-layout>