<?php

namespace App\Imports;

use App\Models\Partners;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PartnersImport implements ToModel,WithHeadingRow
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
            'organization'=> $row['organization'],
            'region'=> $row['region'],
            'country'=> $row['country'],
            'type_of_org'=> $row['type_of_org'],
            'name_of_focus_person'=> $row['name_of_focus_person'],
            'position'=> $row['position'],
            'organization_review'=> $row['organization_overview'],
            'area_of_focus'=> $row['area_of_focus'],
            'source_funding'=> $row['source_funding'],
            'thematic_area'=> $row['thematic_area'],
            'services_offered'=> $row['services_offered'],
            'youth_focused_projects'=> $row['youth_focused_projects'],
            'agreement_with_auc'=> $row['agreement_with_auc'],
            'email'=>$row['email'] ?? "-",
            'website'=>$row['website']?? "-",
            'address'=>'-',
            'phone'=>'-',
            'organization_review'=> '-',
            'position'=> '-'
        ]);
    }
}
