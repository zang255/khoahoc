<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $table = 'promotions'; // Tên bảng trong cơ sở dữ liệu
    protected $fillable = ['code', 'discount', 'valid_from', 'valid_to']; // Các trường có thể gán giá trị
}
