<?php

namespace App\Imports;

use App\Models\CommunityEngagement;
use Maatwebsite\Excel\Concerns\ToModel;

class CommunityEngagementImport implements ToModel
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
            'name'=> $row[0],
            'age'=> $row[1],
            'country'=> $row[2],
            'region'=> $row[3],
            'languages_spoken'=> $row[4],
            'organization'=> $row[5],
            'thematic_area'=> $row[6],
            'email'=> $row[7],
        ]);
    }
}
