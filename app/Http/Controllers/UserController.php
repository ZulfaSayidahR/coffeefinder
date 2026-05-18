<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    // LIST USER
    public function index()
    {
        $users = User::latest()->get();

        return view('admin.user.index', compact('users'));
    }

    // DELETE USER
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()
            ->back()
            ->with('success', 'User berhasil dihapus');
    }
}