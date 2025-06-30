<x-mail::message>
# Ciao {{ $user->name }}, 
## la tua richiesta è stata accettata


<x-mail::button :url="route('revisor.acceptUser', ['user' => $user->id])">
accept 
</x-mail::button>
<x-mail::button :url="route('revisor.rejectUser', ['user' => $user->id])">
reject
</x-mail::button>

# Grazie mille per la collaborazione
</x-mail::message>
