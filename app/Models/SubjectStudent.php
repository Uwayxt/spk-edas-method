<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectStudent extends Model
{
    use HasFactory;
    protected $fillable = ['student_id','criteria_id','value'];
}
