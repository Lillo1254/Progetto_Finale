<x-mail::message>
# Ciao {{ $user->name }}, 
## la tua richiesta è stata accettata


<x-mail::button :url="route('home')">
Inizia a revisionare subito i primi articoli !! 
</x-mail::button>

# Grazie mille per la collaborazione
</x-mail::message>
