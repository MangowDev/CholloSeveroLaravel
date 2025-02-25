<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users; 

class UsersController extends Controller
{

    public function get()
    {
        $users = Users::with("deals")->get();
        return response()->json($users);
    }


    public function create(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:30',
            'password' => 'required|string|max:255',
            'email' => 'required|email|max:60',
            'role' => 'required|string|max:20',
        ]);

        $user = Users::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ], 201);
    }

    public function delete($id)
    {
        $user = Users::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully'
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $user = Users::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        $request->validate([
            'username' => 'required|string|max:30',
            'email' => 'required|email|max:60',
            'role' => 'required|string|max:20',
        ]);

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user
        ], 200);
    }


}