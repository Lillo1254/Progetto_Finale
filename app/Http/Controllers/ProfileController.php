<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
$user = Auth::user();
$articles = Article::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        return view('profile.profile', compact('user', 'articles'));
    }
}

