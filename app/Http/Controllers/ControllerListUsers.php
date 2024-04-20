<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\list_users;

class ControllerListUsers extends Controller
{
    public function index()
    {
        return view('List', ["pages" => "list user", "blog" => list_users::alls()]);
    }
    public function show($slug)
    {

        $user = list_users::findSlug($slug);

        if (!$user) {
            abort(404); // Jika pengguna tidak ditemukan, tampilkan halaman 404
        }

        return view('users', [
            "pages" => "users",
            "item" => $user,
            "management" => $user->find_management // Memanggil relasi find_management() pada instance $user
        ]);
    }
}
