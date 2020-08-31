<?php

namespace App\Imports;

use App\Models\YouthOrg;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class YouthOrgImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new YouthOrg([
            'uuid'=> uniqid(),
            'name'=> $row[0],
            'country'=> $row[1],
            'location'=> $row[2],
            'legal_status'=> $row[3],
            'thematic_focus'=> $row[4],
            'phone'=> $row[5],
            'email'=> $row[6],
            'website'=> $row[7],
        ]);
    }
}
