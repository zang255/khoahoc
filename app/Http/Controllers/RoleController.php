<?php

namespace App\Http\Controllers;
session_start();

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $data = Role::query()->latest()->get();

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();

        return view('admin.roles.index', compact('data'));
    }
     public function create()
    {
        $_SESSION['thong bao']="Successfully";
        return view('admin.roles.create');
    }
    public function store(Request $request)
{
    // Xác thực dữ liệu từ request
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
    ]);

    Role::query()->create($validatedData);

    return redirect()->route('roles.index');
}

}
