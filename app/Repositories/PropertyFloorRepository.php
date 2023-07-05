<?php
namespace App\Repositories;

use App\Models\Property;
use App\Models\PropertyFloor;
use Illuminate\Support\Facades\File;

class PropertyFloorRepository implements IPropertyFloorRepository
{
    // public function getAll()
    // {
    //    return  Property::with(['propertyTranslation','propertyTranslationEnglish','category.categoryTranslation'])
    //         ->orderBy('id','DESC')
    //         ->get();
    // }

    public function getById($id)
    {
        // return Property::with('propertyTranslation','propertyTranslationEnglish','category.categoryTranslation','tags')
        // ->first('id', $id);
        return PropertyFloor::find($id);
    }

    public function getByPropertyDetailsId($id)
    {
        return PropertyFloor::where('property_details_id', $id)->get();
    }

    public function add($data)
    {
        return PropertyFloor::create($data);
    }

    public function addRange($data, $id)
    {
        foreach($data as $floor)
        {
            $floor['property_details_id'] = $id;
            PropertyFloor::create($floor);
        }
    }

    public function update($data,$id)
    {
        $old = $this->getByPropertyDetailsId($id);
        foreach ($old as $oldFloor)
        {
            $to_delete = true;
            foreach ($data as $floor) {
                if(isset($floor['id']))
                    if($floor['id'] == $oldFloor->id)
                        $to_delete = false;
            }
            if($to_delete)
            {
                PropertyFloor::destroy($oldFloor->id);
                File::delete(public_path() . "/images/floors/". $oldFloor->image);
            }
        }

        foreach ($data as $floor) {
            if(!isset($floor['id']))
                $floor['id'] = 0;
            if(isset($floor['image']))
            {
                PropertyFloor::updateOrCreate(
                    [
                        'id' => $floor['id'],
                    ], //condition
                    [
                        'property_details_id' => $id,
                        'unit_id' => $floor['unit_id'],
                        'baths' => $floor['baths'],
                        'is_sold' => $floor['is_sold'],
                        'min_price' => $floor['min_price'],
                        'max_price' => $floor['max_price'],
                        'min_size' => $floor['min_size'],
                        'max_size' => $floor['max_size'],
                        'note_ar' => $floor['note_ar'],
                        'note_en' => $floor['note_en'],
                        'ivr_link' => $floor['ivr_link'],
                        'image' => $floor['image'],
                    ]
                );
            }
            else
            {
                PropertyFloor::updateOrCreate(
                    [
                        'id' => $floor['id'],
                    ], //condition
                    [
                        'property_details_id' => $id,
                        'unit_id' => $floor['unit_id'],
                        'baths' => $floor['baths'],
                        'is_sold' => $floor['is_sold'],
                        'min_price' => $floor['min_price'],
                        'max_price' => $floor['max_price'],
                        'min_size' => $floor['min_size'],
                        'max_size' => $floor['max_size'],
                        'note_ar' => $floor['note_ar'],
                        'note_en' => $floor['note_en'],
                        'ivr_link' => $floor['ivr_link'],
                    ]
                );
            }

        }

    }

    public function delete($id)
    {
        $floor = $this->getById($id);
        $floor->destroy();
    }
}
