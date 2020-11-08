<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{
    protected $table = 'partners';
    protected $fillable = ['uuid','organization','region','country','address','type_of_org','name_of_focus_person',
    'phone','email','website','position','organization_review','area_of_focus','source_funding',
    'thematic_area','services_offered','youth_focused_projects','agreement_with_auc'];
}
