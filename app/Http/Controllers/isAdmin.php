<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class isAdmin extends Controller
{
    public function accept(User $user) {
       $user->is_revisor = true;
        $user->save();

        return redirect('home')->with('success', "L'utente {$user->name} è ora un revisore.");
    }

    public function reject(User $user) {
        return redirect('home')->with('success', "L'utente {$user->name} non puo' essere un revisore.");
    }
}
