<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Review;
use Illuminate\Http\Request;

class CourseClientController extends Controller
{
    public function index()
    {
        $data = Course::query()->with(['category', 'instructor'])->get();

        return view('client.courses.index', compact('data'));
    }

    public function show(Course $course)
    {
        $reviews=Review::where('course_id',$course->id)->with('user')->get();
        
        
        $data = Course::query()->with(['category', 'instructor'])->latest()->paginate(6);

        return view('client.courses.detail', compact('course','data','reviews'));
    }
   

    
    
}
