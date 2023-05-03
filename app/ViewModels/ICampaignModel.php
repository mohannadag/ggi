<?php
namespace App\ViewModels;
use Illuminate\Http\Request;

interface ICampaignModel
{
    public function getAllCampaign(Request $request);
    public function getCampaignById($id);
    public function addCampaign(Request $request);
    public function updateCampaign(Request $request,$id);
    public function delete($id);
}
