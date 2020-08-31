<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YouthOrg extends Model
{
    protected $primarykey = 'id';
    protected $table = 'youth_org';
    protected $fillable = ['uuid','name','country','location','legal_status','thematic_focus','phone','email','website'];
}
