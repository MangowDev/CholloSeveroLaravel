<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Obtiene todos los usuarios con sus relaciones.
     */
    public function get()
    {
        $users = User::with("deals")->get();
        return response()->json($users);
    }

    /**
     * Crea un nuevo usuario.
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|email|max:60|unique:users',
            'password' => 'required|string|min:8|max:255',
        ]);

        $role = $request->role ?? 'user';

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $role, 
        ]);

        return redirect()->route('chollos')->with('message', 'Registration successful');
    }

    /**
     * Elimina un usuario por ID.
     */
    public function delete($id)
    {
        $user = User::find($id);

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

    /**
     * Actualiza un usuario existente.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|email|max:60|unique:users,email,' . $id,
            'role' => 'required|string|max:20',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user
        ], 200);
    }
}
