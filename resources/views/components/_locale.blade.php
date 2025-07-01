<form class="d-inline" action="{{route('setlocale', $lang)}}" method="POST" class="bg-none border-0">
    @csrf
    <button type="submit" class="bg-none border-0 p-0 m-0">
        
        <img src="{{asset('vendor/blade-flags/language-' . $lang . '.svg')}}" width="28" height="28" />
        
    </button>
</form>