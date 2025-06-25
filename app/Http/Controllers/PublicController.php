<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home   () {
    return view('welcome');
}

public function profile() {
    $user = auth()->user();
    return view('profile.profile', compact('user'));
    
}

public function sendForm() {
    return view('profile.form-mail');
}
}
