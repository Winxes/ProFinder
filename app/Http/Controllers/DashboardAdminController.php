<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Inertia\Inertia;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $userCount = User::count();  
        $postCount = Post::count();  

        $users = User::withCount('posts')->get();  
        return Inertia::render('DashboardAdmin', [
            'userCount' => $userCount,
            'postCount' => $postCount,
            'users' => $users
        ]);
    }
}
