<?php

namespace App\Imports;

use App\Models\YouthInfo;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

class YouthInfoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new YouthInfo([
            
            'uuid'=> uniqid(),
            'name'=> $row[0],
            'dob'=> $row[1],
            'age'=> $row[2],
            'gender'=> $row[3],
            'nationality'=> $row[4],
            'email'=> $row[5],
            'phone'=> $row[6],
            'education'=> $row[7],
            'occupation'=> $row[8],
            'thematic_area'=> $row[9],
            'data_source'=> $row[10],
            'year'=> $row[11],
        ]);
    }
}
