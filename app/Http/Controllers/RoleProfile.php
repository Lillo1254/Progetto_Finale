<?php

namespace App\Http\Controllers;

use App\Mail\MailRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RoleProfile extends Controller
{
    public function send(Request $request)
    {

        $user = auth()->user();

        if ($user->is_revisor) {
            return redirect()->route('home')->with('message', 'Sei già un revisore!');
        }
        Mail::to('nostramail@404notfound.com')->send(new MailRevisor($user));

        return redirect()->route('home')->with('message', 'Richiesta inviata con successo');
    }
}
