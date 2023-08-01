<?php
namespace App\ViewModels;

use App\Services\PropertySearchService;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PropertySearchModel implements IPropertySearchModel
{
    private $_propertySearchService;

    public function __construct(PropertySearchService $propertySearchService)
    {
        $this->_propertySearchService = $propertySearchService;
    }

    public function getData(Request $request, $perPage = 6, $all = false)
    {
        Session::get('currentLocal');
        //dd($request);
        // min & max price

        $min = 1;
        $max = 999999999;
        if($request->has('minPrice') && $request->minPrice != "")
            $min = $request->minPrice;

        if($request->has('maxPrice') && $request->maxPrice != "")
            $max = $request->maxPrice;

        // rooms
        // $rooms = "";
        // if($request->has('bed') && $request->bed != "")
        // {
        //     switch($request->bed){
        //         case '1':
        //             $rooms = "1+0";
        //             break;
        //         case '2':
        //             $rooms = "1+1";
        //             break;
        //         case '3':
        //             $rooms = "2+1";
        //             break;
        //         case '4':
        //             $rooms = "3+1";
        //             break;
        //         case '5':
        //             $rooms = "4+1";
        //             break;
        //         case '6':
        //             $rooms = "5+1";
        //             break;
        //         case '7':
        //             $rooms = "6+1";
        //             break;
        //         case '8':
        //             $rooms = "7+1";
        //             break;
        //         case '9':
        //             $rooms = "8+1";
        //             break;
        //         default:
        //             $rooms = "";
        //             break;
        //     }
        // }



        $data = [];
        $data['title'] = $request->input('title');
        $data['category'] = $request->input('category_id');
        $data['city'] = $request->input('city_id');
        $data['state'] = $request->input('state');
        $data['minPrice'] = $min;
        $data['maxPrice'] = $max;
        $data['minArea'] = $request->input('minArea');
        $data['maxArea'] = $request->input('maxArea');
        $data['bed'] = $request->input('bed');
        // $data['bed'] = $rooms;
        $data['bath'] = $request->input('bath');
        $data['property_name'] = $request->input('property_name');
        $data['property_id'] = $request->input('property_id');
        // dd($data);
        return $this->_propertySearchService->getData($data, $perPage, $all);
    }

}
