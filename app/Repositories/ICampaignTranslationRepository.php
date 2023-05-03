<?php
namespace App\Repositories;

interface ICampaignTranslationRepository
{
    public function getAllCampaignTranslation();
    public function getByLocale($locale);
    public function getCampaignTranslationById($data);
    public function add($data);
    public function update($data);
    public function delete($id);
}
