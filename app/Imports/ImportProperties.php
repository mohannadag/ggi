<?php

namespace App\Imports;

use App\Models\Property;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportProperties implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Property([
            'property_id' => $row[0],
            'category_id' => $row[1],
            'country_id' => $row[2],
            'city_id' => $row[3],
            'state_id' => $row[4],
            'currency_id' => $row[5],
            'title' => $row[6],
            'type' => $row[7],
            'lat' => $row[8],
            'lon' => $row[9],
            'price' => $row[10],
            'featured' => $row[11],
            'description' => $row[12],
            'user_id' => $row[13],
            'status' => $row[14],
            'moderation_status' => $row[15],
            'package_id' => $row[16],
            'is_featured' => $row[17],
            'thumbnail' => $row[18],
            'background_image' => $row[19],
        ]);
    }
}
