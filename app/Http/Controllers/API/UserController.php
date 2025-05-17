<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 📌 Afficher tous les utilisateurs
    public function index()
    {
        return response()->json(
            User::select('id', 'name', 'email', 'created_at')->get()
        );
    }

    // 📌 Afficher un utilisateur par ID
    public function show(User $user)
    {
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'created_at' => $user->created_at,
        ]);
    }

    // 📌 Supprimer un utilisateur
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'Utilisateur supprimé.']);
    }
}
