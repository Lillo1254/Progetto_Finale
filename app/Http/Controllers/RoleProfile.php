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

         $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

        if ($request->name !== $user->name || $request->email !== $user->email) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['name' => 'I dati inseriti non corrispondono al tuo account.']);
        }


        Mail::to('nostramail@404notfound.com')->send(new MailRevisor($user));

        return redirect()->route('home')->with('message', 'Richiesta inviata con successo');
    }
}
