<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityEngagement extends Model
{
    protected $table = 'community_engagement';
    protected $fillable = ['id','uuid','name','age','country','region','languages_spoken','organization','thematic_area','email'];
}
