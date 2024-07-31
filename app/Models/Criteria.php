<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;
    protected $fillable = ['name','weight','major_id','role_criteria'];

    public function majors(){
        return $this->belongsToMany(Major::class);
    }
}
