<?php

namespace App\Repositories;

use App\Models\CitizenshipTranslation;

class CitizenshipTranslationRepository implements ICitizenshipTranslationRepository
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getById($data)
    {
        return CitizenshipTranslation::where('citizenship_id', $data['id'])->where('locale', $data['locale'])->first();
    }

    public function getByLocale($locale)
    {
    }

    public function add($data)
    {
        CitizenshipTranslation::create([
            'citizenship_id' => $data['citizenshipId'],
            'locale' => $data['locale'],
            'title' => $data['title'],
            'banner_text' => $data['banner_text'],
            'main_button_link' => $data['main_button_link'],
            'main_button_text' => $data['main_button_text'],
            'extra_button_link' => $data['extra_button_link'],
            'extra_button_text' => $data['extra_button_text'],
            'file' => $data['file'],
            'overview_title' => $data['overview_title'],
            'overview_desc' => $data['overview_desc'],
            'overview_first_title' => $data['overview_first_title'],
            'overview_first_desc' => $data['overview_first_desc'],
            'overview_second_title' => $data['overview_second_title'],
            'overview_second_desc' => $data['overview_second_desc'],
            'overview_third_title' => $data['overview_third_title'],
            'overview_third_desc' => $data['overview_third_desc'],
            'obtaining_text' => $data['obtaining_text'],
            'acquisition_text' => $data['acquisition_text'],
            'documents_text' => $data['documents_text'],
            'stages_text' => $data['stages_text'],
            'obtaining_title' => $data['obtaining_title'],
            'acquisition_title' => $data['acquisition_title'],
            'documents_title' => $data['documents_title'],
            'stages_title' => $data['stages_title'],
        ]);
    }

    public function update($data)
    {
        CitizenshipTranslation::updateOrCreate(
            [
                'citizenship_id' => $data['citizenshipId'],
                'locale'    =>  $data['locale'],
            ], //condition
            [
                'title' => $data['title'],
                'banner_text' => $data['banner_text'],
                'main_button_link' => $data['main_button_link'],
                'main_button_text' => $data['main_button_text'],
                'extra_button_link' => $data['extra_button_link'],
                'extra_button_text' => $data['extra_button_text'],
                'file' => $data['file'],
                'overview_title' => $data['overview_title'],
                'overview_desc' => $data['overview_desc'],
                'overview_first_title' => $data['overview_first_title'],
                'overview_first_desc' => $data['overview_first_desc'],
                'overview_second_title' => $data['overview_second_title'],
                'overview_second_desc' => $data['overview_second_desc'],
                'overview_third_title' => $data['overview_third_title'],
                'overview_third_desc' => $data['overview_third_desc'],
                'obtaining_text' => $data['obtaining_text'],
                'acquisition_text' => $data['acquisition_text'],
                'documents_text' => $data['documents_text'],
                'stages_text' => $data['stages_text'],
            ]
        );
    }

    public function delete($id)
    {
        CitizenshipTranslation::where('citizenship_id', $id)->delete();
    }
}
