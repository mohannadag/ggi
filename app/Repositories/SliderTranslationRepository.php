<?php
namespace App\Repositories;

use App\Models\SliderTranslation;

class SliderTranslationRepository implements ISliderTranslationRepository
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getById($data)
    {
        return SliderTranslation::where('slider_id',$data['id'])->where('locale',$data['locale'])->first();
    }

    public function getByLocale($locale)
    {

    }

    public function add($data)
    {
        SliderTranslation::create([
            'slider_id'=> $data['sliderId'],
            'locale'=> $data['locale'],
            'file'=> $data['file'],
            'mobile_file'=> $data['mobile_file'],
            'name'=>$data['name'],
            'address'=>$data['address'],
            'description'=>$data['description'],
            'button_text'=>$data['button_text'],
        ]);
    }

    public function update($data)
    {
        SliderTranslation::updateOrCreate(
            [
                'slider_id' => $data['sliderId'],
                'locale'    =>  $data['locale'],
            ], //condition
            [
                'name' => $data['name'],
                'address' => $data['address'],
                'file'=> $data['file'],
                'mobile_file'=> $data['mobile_file'],
                'description' => $data['description'],
                'button_text'=>$data['button_text'],
            ]
        );
    }

    public function delete($id)
    {
        SliderTranslation::where('slider_id',$id)->delete();
    }
}
