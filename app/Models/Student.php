<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name','school_address','major_id','subject_result','recomendation_result'];

    public function majors()  {
        return $this->belongsTo(Major::class,'major_id','id');
    }

    public function subjectStudent()  {
        return $this->belongsToMany(Criteria::class);
    }
}
