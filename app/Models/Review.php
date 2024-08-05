<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews'; 
    protected $fillable = ['course_id', 'user_id', 'date', 'comment']; 

    public function user(){
        return $this->belongsTo(User::class);
    }
}
