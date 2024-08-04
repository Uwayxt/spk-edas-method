<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValueCriteria extends Model
{
    use HasFactory;
    protected $fillable = ['criteria_id','role','value'];

}
