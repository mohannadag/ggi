<?php

namespace App\Imports;

use App\Models\image;
use Maatwebsite\Excel\Concerns\ToModel;

class ImagesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Image([
            'name' => $row[0],
            'image_path' => $row[1],
            'property_id' => $row[2],
        ]);
    }
}
