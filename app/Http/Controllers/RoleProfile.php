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
        $user->is_revisor = $request->input('is_revisor');
        $user->save();

        Mail::to('nostramail@404notfound.com')->send(new MailRevisor($user));
        return redirect()->route('profile', ['user' => $user]);
    }
}
