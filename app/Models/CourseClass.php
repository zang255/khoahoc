<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseClass extends Model
{
    use HasFactory;
    protected $table = 'course_classes'; // Tên bảng trong cơ sở dữ liệu
    protected $fillable = ['course_id', 'name', 'description', 'schedule']; // Các trường có thể gán giá trị
}
