<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

        return response()->json($user);
        
    }
    public function filterByName($name) {
        $users = User::where('name','LIKE','%'. $name .'%')->get();
        
        return response()->json($users);
    }
    
}
