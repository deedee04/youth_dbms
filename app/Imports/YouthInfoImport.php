<?php

namespace App\Imports;

use App\Models\YouthInfo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class YouthInfoImport implements ToModel, WithHeadingRow, WithBatchInserts,WithChunkReading
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
            'name'=> $row['name'],
            'dob'=> $row['dob'],
            'age'=> $row['age'],
            'gender'=> $row['gender'],
            'nationality'=> $row['nationality'],
            'email'=> $row['email'],
            // 'phone'=> $row['phone'],
            'education'=> $row['education'],
            'occupation'=> $row['occupation'],
            'thematic_area'=> $row['thematic_area'],
            'data_source'=> $row['data_source'],
            'year'=> $row['year'],

        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
