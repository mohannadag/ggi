<?php

namespace App\Imports;

use App\Models\PropertyDetail;
use Maatwebsite\Excel\Concerns\ToModel;

class PropertiesDetailsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PropertyDetail([
            'property_id' => $row[0],
            'bed' => $row[23],
            'bath' => $row[24],
            'room_size' => $row[25],
            'content' => $row[26],
            'video' => $row[27],
            'address' => $row[28],
            'blocks' => $row[29],
            'landscape' => $row[30],
            'view' => $row[31],
            'available_floors' => $row[32],
            'balcony' => $row[33],
            'heating' => $row[34],
            'emptiness' => $row[35],
            'maintenance_fee' => $row[36],
            'creditability' => $row[37],
            'building_age' => $row[38],
            'units_infloors' => $row[39],
            'convertability' => $row[40],
            'total_units' => $row[41],
            'title_deed_type' => $row[42],
            'delivery_month' => $row[43],
            'deliver_year' => $row[44],
            'payment_options' => $row[45],
            'installment_months' => $row[46],
        ]);
    }
}
