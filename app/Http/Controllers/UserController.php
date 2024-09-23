<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function filterBySkill($skillName) {
        $users = User::whereHas('skills', function($query) use ($skillName) {
            $query->where('name', $skillName);
        })->get();

        return response()->json($users);

    }

    public function attachSkill(Request $request, $user_id) {
        $user = User::find($user_id);

        // request->skills should be array
        $user->skills()->attach($request->skills);

        return response()->json($user)->setStatusCode(201);
        
    }
    public function findByName($name) {
        $users = User::where('name','LIKE','%'. $name .'%')->get();
        
        return response()->json($users);
    }
    
    public function profile($user_id) {
        $user = User::find($user_id);
        $posts = Post::where('user_id', $user_id)->get();
        return Inertia::render('User', [
            'user' => $user,
            'posts' => $posts
        ]);
    }   

}
