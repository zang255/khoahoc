<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
    protected $table = 'instructors'; // Tên bảng trong cơ sở dữ liệu
    protected $fillable = ['name', 'email', 'bio']; // Các trường có thể gán giá trị
}
