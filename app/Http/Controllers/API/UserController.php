<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Affiche la liste des utilisateurs.
     */
    public function index()
    {
        return User::select('id', 'name', 'email', 'created_at')->get();
    }

    /**
     * Affiche un utilisateur spécifique.
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Met à jour un utilisateur.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|required|min:6',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        }

        $user->update($validated);

        return response()->json($user);
    }

    /**
     * Supprime un utilisateur.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(['message' => 'Utilisateur supprimé.']);
    }
}
