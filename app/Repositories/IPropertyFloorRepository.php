<?php
namespace App\Repositories;

interface IPropertyFloorRepository
{
    // public function getAll();
    public function getById($id);
    public function add($data);
    public function addRange($data, $id);
    public function update($data,$id);
    public function delete($id);
}
