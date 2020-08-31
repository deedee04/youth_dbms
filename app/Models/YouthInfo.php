<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YouthInfo extends Model
{
    protected $primarykey = 'id';
    protected $table = 'youth_info';
    protected $fillable = ['uuid','name','dob','age','gender','nationality','email','phone','education','occupation','thematic_area','data_source','year'];
}
