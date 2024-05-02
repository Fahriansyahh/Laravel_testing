<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\list_users;

class ControllerListUsers extends Controller
{
    public function index()
    {
        $user = list_users::filter();
        if (request('slug')) {
            return view('users', [
                "pages" => "users",
                "item" => $user,
                "management" => $user->find_management
            ]);
        } else {
            return view('List', [
                "pages" => "list user",
                "blog" => $user
            ]);
        }
    }
}
