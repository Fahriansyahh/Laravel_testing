<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\management;

class ControllerManagement extends Controller
{
    public function index()
    {

        return view('list_management', [
            "pages" => "List Management", "management" => management::alls()
        ]);
    }
    public function show(management $management)
    {
        //! hash many dan belongto harus memiliki sebuah value nilai kemana sebuah nilai itu mengerah
        //!> use App\Models\management
        //! > $user = management::first()dan menjalankan  $user->list anngap ini adalah tinker yang mengambil nilai yang sama ini akan membawa sebuah relations itu bertuju

        //!variabel management membawa relationship itu ke find slug sehiggan mendapatkan sebuah nilai


        return view('management', [
            "pages" => "Management",
            "managementSlug" => $management,
            "management" => $management->list

        ]);
    }
}
