<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{

    use HasFactory;

    protected $table = 'chapters';

    protected $fillable = [
        'tenChuongHoc',
        'trangThai',
        'course_id',
        'user_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
