<form class="d-none" action="{{route('setlocale', $lang)}}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary">
        
        <img src="{{asset('vendor/blade-flags/language-' . $lang . '.svg')}}" width="32" height="32" />
        
    </button>
</form>