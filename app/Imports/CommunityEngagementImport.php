<?php

namespace App\Imports;

use App\Models\CommunityEngagement;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class CommunityEngagementImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CommunityEngagement([
            'uuid'=> uniqid(),
            'name'=> $row['first_name'] ??"-". ' '.  $row['last_name']??"-",
            'age'=> $row['age']??"-",
            'country'=> $row['country']??"-",
            'region'=> $row['region']??"-",
            'languages_spoken'=> $row['languages_spoken']??"-",
            'organization'=> $row['organization']??"-",
            'thematic_area'=> $row['thematic_area']??"-",
            'email'=> $row['email']??"-",
        ]);
    }
}
