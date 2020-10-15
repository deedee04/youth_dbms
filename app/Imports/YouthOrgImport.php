<?php

namespace App\Imports;

use App\Models\YouthOrg;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class YouthOrgImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new YouthOrg([
            'uuid'=> uniqid(),
            'name'=> $row['name'],
            'country'=> isset($row['country']) ? $row['country']: '-',
            'location'=> $row['location'],
            'legal_status'=> $row['legal_status'],
            'thematic_focus'=> $row['thematic_focus'],
            'phone'=> $row['phone'],
            'email'=> $row['email'],
            'website'=> $row['website'],
        ]);
    }
}
