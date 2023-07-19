<?php
namespace App\Services;

use App\Repositories\IPropertyArea;
use App\Repositories\IPropertySearchRepository;

class PropertySearchService
{
    private $_propertySearchRepository;
    private $_propertyArea;

    public function __construct(IPropertySearchRepository $_propertySearchRepository)
    {
        $this->_propertySearchRepository = $_propertySearchRepository;
    }
    public function getData($data, $perPage = 6)
    {
        return $this->_propertySearchRepository->filterProperties($data, $perPage);
    }
}
