<?php

namespace App\Http\Controllers;

use App\Models\list_users;
use App\Models\management;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ControllerDashboardListuser extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.listuser', [
            "pages" => "Dashboard Management", "users" => list_users::alls()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.userCreate', ["management" => management::alls()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nama' => 'required|unique:list_users|min:3|max:25',
            'umur' => 'required|numeric|min:3',
            'married' => 'max:2',
            'description' => 'required|min:3|max:255',
            'about' => '',
            'management_id' => 'required',
            'images' => 'required|image|file|max:1024',
        ]);
        if ($request->file('images')) {
            $validated['images'] = $request->file('images')->store('images');
        };

        $slug = Str::slug($validated['nama'], '-');
        $validated['slug'] =  $slug;
        $validated['user_id'] = Auth::id();
        $validated['married'] = $request->boolean('married');
        $validated['description'] = strip_tags($validated['description']);
        $validated['about'] = strip_tags($validated['about']);
        list_users::create($validated);
        return redirect('/dashboard/listusers/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {

        $item = list_users::findSlug($slug);
        // return view('dashboard.managementShow', compact('item'));
        if (!$item) {
            abort(404); // Menampilkan halaman 404 jika record tidak ditemukan
        }
        return view('dashboard.user', [
            "pages" => "List user " . $item->nama, "item" => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $listuser = list_users::where("id", $id)->first();

        return view('dashboard.userEdit', [
            "pages" => "List user ", "item" => $listuser, "management" => management::alls()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $rules = [

            'umur' => 'required|numeric|min:3',
            'married' => 'max:2',
            'description' => 'required|min:3|max:255',
            'about' => 'required',
            'management_id' => 'required',
            'images' => 'required|image|file|max:1024',

        ];
        $listuser = list_users::findOrFail($id);
        if ($request->nama !== $listuser->nama) {
            $rules['nama'] = "required|unique:list_users|min:3|max:15";
            $rules['slug'] = 'required';
        }
        if ($request->management_id !== $listuser->management_id) {
            $rules['management_id'] = "required";
        }
        $slug = Str::slug($request->nama, '-');
        $request->merge([
            'about' => strip_tags($request->input('about')),
            'description' => strip_tags($request->input('description')),
            'slug' =>   $slug,
            'married' =>  $listuser->married !== $request->boolean('married') ? $listuser->married : $request->boolean('married')
        ]);


        $validated = $request->validate($rules);

        if ($request->file('images')) {
            if ($listuser->images) {
                Storage::delete($listuser->images);
            }
            $validated['images'] = $request->file('images')->store('images');
        };
        $listuser->update($validated);
        return redirect('/dashboard/listusers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $user = list_users::findOrFail($id);
        if ($user->images) {
            Storage::delete($user->images);
        }
        $user->delete();

        return redirect()->route('listusers.index')->with('success', 'User deleted successfully');
    }
}
