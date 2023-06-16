<?php
namespace App\Repositories;

interface IBlogRepository
{
    public function getAll($locale = null);
    public function getById($id);
    public function add($data);
    public function update($data,$id);
    public function delete($id);
    public function forceDelete($id);
    public function getDeleted();
}
