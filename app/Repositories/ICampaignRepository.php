<?php
namespace App\Repositories;

interface ICampaignRepository
{
    public function getAllCampaign();
    public function getCampaignById($id);
    public function add($data);
    public function update($data,$id);
    public function delete($id);
}
