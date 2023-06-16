<?php
namespace App\ViewModels;
use Illuminate\Http\Request;

interface IBlogModel
{
    public function getAllTable(Request $request);
    public function add(Request $request);
    public function update(Request $request, $blog);
    public function delete($id);
    public function forceDelete($id);
    public function getAllDeleted(Request $request);
}
