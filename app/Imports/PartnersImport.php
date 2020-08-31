<?php

namespace App\Imports;

use App\Models\Partners;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PartnersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Partners([
            'uuid'=> uniqid(),
            'organization'=> $row[0],
            'region'=> $row[1],
            'country'=> $row[2],
            'address'=> $row[3],
            'type_of_org'=> $row[4],
            'name_of_focus_person'=> $row[5],
            'phone'=> $row[6],
            'email'=> $row[7],
            'website'=> $row[8],
            'position'=> $row[9],
            'organization_review'=> $row[10],
            'area_of_focus'=> $row[11],
            'source_funding'=> $row[12],
            'thematic_area'=> $row[13],
            'services_offered'=> $row[14],
            'youth_focused_projects'=> $row[15],
            'agreement_with_auc'=> $row[16],
        ]);
    }
}
