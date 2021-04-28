<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grade extends Model
{
    use HasFactory;

    public $fillable = ['grade', 'student_id', 'lecture_id'];

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    public function lecture()
    {
        return $this->belongsTo('App\Models\Lecture');
    }
}
