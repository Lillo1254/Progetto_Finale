<form class="d-inline" action="{{route('setlocale', $lang)}}" method="POST">
    @csrf
    <button type="submit" >
        
        <img src="{{asset('vendor/blade-flags/language-' . $lang . '.svg')}}" class="img-fluid" width="32" height="32" />
        
    </button>
</form>