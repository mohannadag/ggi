<?php
namespace App\Repositories;

use App\Models\PropertyDetail;

class PropertyDetailRepository implements IPropertyDetailRepository
{
    public function getById($id)
    {
        // TODO: Implement getById() method.
    }
    public function getByPropertyId($id)
    {
       return PropertyDetail::where('property_id',$id)->first();
    }
    public function add($data)
    {
      return PropertyDetail::create([
            'property_id'=> $data['propertyId'],
            'bed'=> $data['bed'],
            'bath'=> $data['bath'],
            'garage'=> $data['garage'],
            'blocks'=> $data['blocks'],
            'parcel'=> $data['parcel'],
            'floor'=> $data['floor'],
            'room_size'=> $data['room_size'],
            'content'=> $data['content'],
            'video'=> $data['video'],
            'landscape'=> $data['landscape'] ?? null,
            'view'=> $data['view'] ?? null,
            'available_floors'=> $data['available_floors'] ?? null,
            'balcony'=> $data['balcony'] ?? null,
            'heating'=> $data['heating'] ?? null,
            'emptiness'=> $data['emptiness'] ?? null,
            'citizenship'=> $data['citizenship'] ?? null,
            'cash'=> $data['cash'] ?? null,
            'installments'=> $data['installments'] ?? null,
            'maintenance_fee'=> $data['maintenance_fee'] ?? null,
            'creditability'=> $data['creditability'] ?? null,
            'building_age'=> $data['building_age'] ?? null,
            'units_infloors'=> $data['units_infloors'] ?? null,
            'convertability'=> $data['convertability'] ?? null,
            'total_units'=> $data['total_units'] ?? null,
            'title_deed_type'=> $data['title_deed_type'] ?? null,
            'delivery_month'=>$data['delivery_month'] ?? null,
            'deliver_year'=>$data['deliver_year'] ?? null,
            'payment_options'=>$data['payment_options'] ?? null,
            'inside_project'=>$data['inside_project'] ?? null,
            'island_no'=>$data['island_no'] ?? null,
            'sheet_no'=>$data['sheet_no'] ?? null,
            'presentation'=>$data['presentation'] ?? null,
            'precedent_value'=>$data['precedent_value'] ?? null,
            'gauge'=>$data['gauge'] ?? null,

            'ivr'=> $data['ivr'],
            'drive_link'=> $data['drive_link'],
            'plans_link'=> $data['plans_link'],
            'word_link'=> $data['word_link'],
            'prices_link'=> $data['prices_link'],
            'whatsapp_link'=> $data['whatsapp_link'],
        ]);
    }

    public function update($data, $id)
    {
        $propertyDetail = $this->getByPropertyId($id);
        $propertyDetail->update($data);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
