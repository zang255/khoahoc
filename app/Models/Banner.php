<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banners'; // Tên bảng trong cơ sở dữ liệu
    protected $fillable = ['image', 'title', 'link']; // Các trường có thể gán giá trị
}
