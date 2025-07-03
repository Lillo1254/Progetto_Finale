<x-mail::message>
# L'utente {{ $user->name }}, 
## ha chiesto di poter collaborare come revisore


<x-mail::button :url="route('revisor.acceptUser', ['user' => $user->id])">
accept 
</x-mail::button>
<x-mail::button :url="route('revisor.rejectUser', ['user' => $user->id])">
reject
</x-mail::button>

# Grazie 
</x-mail::message>
