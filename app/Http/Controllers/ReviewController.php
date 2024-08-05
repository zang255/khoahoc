<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReviewController extends Controller
{
    public function addReview(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'course_id' => 'required|integer|exists:courses,id',
            'comment' => 'required|string|max:255',
        ]);

        $review = new Review();
        $review->user_id = $request->input('user_id');
        $review->course_id = $request->input('course_id');
        $review->comment = $request->input('comment');
        $review->date = now(); 
        $review->save();

        session()->flash('R_thongbao','Comment thêm thành công');

        return redirect()->back()->with('success', 'Comment đã được thêm thành công!');
    }
}
