<?php
namespace App\ViewModels;

use Illuminate\Http\Request;

interface IUnitsModel
{
    public function getAllList();
    public function getAll(Request $request);
    public function getByLocale();
    public function getById($id);
    public function add(Request $request);
    public function update(Request $request,$id);
    public function delete($id);
}
