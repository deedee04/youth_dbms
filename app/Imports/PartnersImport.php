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
            'type_of_org'=> $row[3],
            'name_of_focus_person'=> $row[4],
            'position'=> $row[5],
            'organization_overview'=> $row[6],
            'area_of_focus'=> $row[7],
            'source_funding'=> $row[8],
            'thematic_area'=> $row[9],
            'services_offered'=> $row[10],
            'youth_focused_projects'=> $row[11],
            'agreement_with_auc'=> $row[12],
            'email'=>$row[13],
            'website'=>$row[14],
        ]);
    }
}
