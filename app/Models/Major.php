<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $fillable = ['name','value','study_program'];

    public function criterias(){
        return $this->belongsToMany(Criteria::class);
    }

    public function students()  {
        return $this->hasMany(Student::class);
    }
}
