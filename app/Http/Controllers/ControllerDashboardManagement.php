<?php

namespace App\Http\Controllers;

use App\Models\management;
use Illuminate\Http\Request;

class ControllerDashboardManagement extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.management', [
            "pages" => "Dashboard Management", "management" => management::alls()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.managementCreate");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'position' => 'required|unique:management|min:3|max:15',
            'role_position' => 'min:3',
        ]);

        management::create($validated);
        return redirect('/dashboard/management/create');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = management::find($id);
        // return view('dashboard.managementShow', compact('item'));
        if (!$item) {
            abort(404); // Menampilkan halaman 404 jika record tidak ditemukan
        }
        $user = $item->list()->get();
        return view('dashboard.managementShow', [
            "pages" => "Management " . $item->postion, "management" => $item, "list" => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(management $management)
    {
        return view('dashboard.managementEdit', [
            "pages" => "Management " . $management->postion, "management" => $management
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, management $management)
    {

        $rules = [
            'role_position' => 'min:3',
        ];

        if ($request->position !== $management->position) {
            $rules['position'] = "required|unique:management|min:3|max:15";
        }
        $request->merge([
            'role_position' => strip_tags($request->input('role_position')),
        ]);
        $validated = $request->validate($rules);


        management::where('id', $management->id)
            ->update($validated);
        return redirect('/dashboard/management');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = management::findOrFail($id);
        $user->delete();

        return redirect()->route('management.index')->with('success', 'User deleted successfully');
    }
}
