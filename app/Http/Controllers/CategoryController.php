<?php

namespace App\Http\Controllers;

session_start();

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::query()->latest()->get();

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit();

        return view('admin.categories.index', compact('data'));
    }
    public function create()
    {
        return view('admin.categories.create');
    }
    public function store(Request $request)
    {
        // Xác thực dữ liệu từ request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::query()->create($validatedData);
        $_SESSION['thong_bao']="Thao tác thành công";

        return redirect()->route('categories.create');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        $_SESSION['thong_bao']="Thao tác thành công";
        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {


        return view('admin.categories.edit', compact( 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
{
   
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        
    ]);

    $category->update($validatedData);
     $_SESSION['thong_bao']="Thao tác thành công";

    return back()->with('success', 'Category updated successfully');
}



}
