<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $data = Course::query()->with(['category', 'instructor'])->latest()->paginate(6);

        return view('admin.courses.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->pluck("name", "id")->all();
        $instructors = Instructor::query()->pluck("name", "id")->all();

        return view('admin.courses.create', compact('categories', 'instructors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'category_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'duration' => 'required|integer|min:1|max:12',
            'instructor_id' => 'required|integer',
            'img_thumb' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);
        
        if ($request->hasFile('img_thumb')) {
            $pathFile = $request->file('img_thumb')->store('courses', 'public');

            $validatedData['img_thumb'] = 'storage/' . $pathFile;
        }

        // Tạo mới bản ghi với dữ liệu đã được validate
        Course::query()->create($validatedData);
        session()->flash('thong_bao', 'Thao tác thành công');

        // Redirect về trang danh sách khóa học
        return redirect()->route('admins.courses.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $categories = Category::query()->pluck("name", "id")->all();
        $instructors = Instructor::query()->pluck("name", "id")->all();


        return view('admin.courses.edit', compact('categories', 'course','instructors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Tìm course theo id
        $course = Course::findOrFail($id);

        // Validate request data
        $validatedData = $request->validate([
            'category_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'duration' => 'required|integer|min:1|max:12',
            'instructor_id' => 'required|integer',
            'img_thumb' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);
        //upload file ảnh vào thư mục storage
        if ($request->hasFile('img_thumb')) {
            $pathFile = $request->file('img_thumb')->store('courses', 'public');

            $validatedData['img_thumb'] = 'storage/' . $pathFile;
        }
        $currenImgThumb=$course->img_thumb;//lưu ảnh cũ vào 1 biến

        // Cập nhật bản ghi với dữ liệu đã được validate
        $course->update($validatedData);
        //nếu update ảnh thì sẽ xoá ảnh cũ đi
        if($currenImgThumb
        &&$request->hasFile('img_thumb')
        &&file_exists(public_path($currenImgThumb))
        ){
            unlink(public_path($currenImgThumb));
        }
        session()->flash('thong_bao', 'Thao tác thành công');


        // Redirect về trang chi tiết khóa học hoặc danh sách khóa học
        return redirect()->route('admins.courses.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        session()->flash('thong_bao', 'Thao tác thành công');

        return redirect()->route('admins.courses.index');
    }
}
