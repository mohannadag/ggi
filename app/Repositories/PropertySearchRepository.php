<?php
namespace App\Repositories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Builder;
use AmrShawky\LaravelCurrency\Facade\Currency;
use Illuminate\Support\Facades\Session;

class PropertySearchRepository implements IPropertySearchRepository
{
     public function getByCategory($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->get();
    }

    public function getByCity($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('city_id',$data['city'])
                        ->get();
    }

    public function getByState($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('state_id',$data['state'])
                        ->get();
    }
    public function getByTitleDeed($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('title_deed_type', $data['title_deed_type']);
                        })
                        ->get();
    }

    public function getByPrice($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                        ->get();
    }

    public function getByArea($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                        })
                        ->get();
    }

    public function getByCategoryCity($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->where('city_id',$data['city'])
                        ->get();
    }

    public function getByCategoryPrice($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                        ->get();
    }

    public function getByCategoryArea($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                        })
                        ->get();
    }

    public function getByCityPrice($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('city_id',$data['city'])
                        ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                        ->get();
    }

    public function getByCityArea($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('city_id',$data['city'])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                        })
                        ->get();
    }

    public function getByPriceArea($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                    ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                    ->whereHas('propertyDetails',function(Builder $query) use($data){
                        $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                    })
                    ->get();
    }

    public function getByBedBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                    ->whereHas('propertyDetails',function(Builder $query) use($data){
                        $query->whereIn('bed',$data['bed']);
                    })
                    ->whereHas('propertyDetails',function(Builder $query) use($data){
                        $query->where('bath',(int)$data['bath']);
                    })
                    ->get();
    }

    public function getByCategoryCityPrice($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                    ->where('category_id',$data['category'])
                    ->where('city_id',$data['city'])
                    ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                    ->get();
    }

    public function getByCategoryCityArea($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                    ->where('category_id',$data['category'])
                    ->where('city_id',$data['city'])
                    ->whereHas('propertyDetails',function(Builder $query) use($data){
                        $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                    })
                    ->get();
    }

    public function getByCategoryPriceArea($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                    ->where('category_id',$data['category'])
                    ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                    ->whereHas('propertyDetails',function(Builder $query) use($data){
                        $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                    })
                    ->get();
    }

    public function getByCityPriceArea($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                    ->where('city_id',$data['city'])
                    ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                    ->whereHas('propertyDetails',function(Builder $query) use($data){
                        $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                    })
                    ->get();
    }

    public function getByCategoryCityPriceArea($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                    ->where('category_id',$data['category'])
                    ->where('city_id',$data['city'])
                    ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                    ->whereHas('propertyDetails',function(Builder $query) use($data){
                        $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                    })
                    ->get();
    }

    public function getByBed($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bed', (int)$data['bed']);
                        })
                        ->get();
    }
    public function getByBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath', (int)$data['bath']);
                        })
                        ->get();
    }

    public function getByCategoryBed($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bed', (int)$data['bed']);
                        })
                        ->get();
    }
    public function getByCategoryBath($data){
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
        ->where('category_id',$data['category'])
        ->whereHas('propertyDetails',function(Builder $query) use($data){
            $query->where('bath', (int)$data['bath']);
        })
        ->get();
    }
    public function getByCategoryBedBath($data){
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
        ->where('category_id',$data['category'])
        ->whereHas('propertyDetails',function(Builder $query) use($data){
            $query->where('bed', (int)$data['bed']);
        })
        ->whereHas('propertyDetails',function(Builder $query) use($data){
            $query->where('bath', (int)$data['bath']);
        })
        ->get();
    }

    public function getByCityBed($data){
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
        ->where('city_id',$data['city'])
        ->whereHas('propertyDetails',function(Builder $query) use($data){
            $query->where('bed', (int)$data['bed']);
        })
        ->get();
    }
    public function getByCityBath($data){
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
        ->where('city_id',$data['city'])
        ->whereHas('propertyDetails',function(Builder $query) use($data){
            $query->where('bath', (int)$data['bath']);
        })
        ->get();
    }
    public function getByCityBedBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('city_id',$data['city'])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bed', (int)$data['bed']);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath', (int)$data['bath']);
                        })
                        ->get();
    }

    public function getByPriceBed($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereIn('bed',$data['bed']);
                        })
                        ->get();
    }
    public function getByPriceBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath',(int)$data['bath']);
                        })
                        ->get();
    }
    public function getByPriceBedBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereIn('bed',$data['bed']);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath',(int)$data['bath']);
                        })
                        ->get();
    }

    public function getByAreaBed($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereIn('bed',$data['bed']);
                        })
                        ->get();
    }
    public function getByAreaBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath',(int)$data['bath']);
                        })
                        ->get();
    }
    public function getByAreaBedBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereIn('bed',$data['bed']);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath',(int)$data['bath']);
                        })
                        ->get();
    }

    public function getByCategoryCityBed($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->where('city_id',$data['city'])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereIn('bed',$data['bed']);
                        })
                        ->get();
    }
    public function getByCategoryCityBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->where('city_id',$data['city'])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath',(int)$data['bath']);
                        })
                        ->get();
    }
    public function getByCategoryCityBedBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->where('city_id',$data['city'])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereIn('bed',$data['bed']);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath',(int)$data['bath']);
                        })
                        ->get();
    }

    public function getByCategoryCityPriceBed($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->where('city_id',$data['city'])
                        ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereIn('bed',$data['bed']);
                        })
                        ->get();
    }
    public function getByCategoryCityPriceBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->where('city_id',$data['city'])
                        ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath',(int)$data['bath']);
                        })
                        ->get();
    }
    public function getByCategoryCityPriceBedBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->where('city_id',$data['city'])
                        ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereIn('bed',$data['bed']);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath',(int)$data['bath']);
                        })
                        ->get();
    }

    public function getByCategoryCityAreaBed($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->where('city_id',$data['city'])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereIn('bed',$data['bed']);
                        })
                        ->get();
    }
    public function getByCategoryCityAreaBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->where('city_id',$data['city'])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath',(int)$data['bath']);
                        })
                        ->get();
    }
    public function getByCategoryCityAreaBedBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->where('city_id',$data['city'])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereIn('bed',$data['bed']);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath',(int)$data['bath']);
                        })
                        ->get();
    }

    public function getByCategoryCityPriceAreaBedBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->where('city_id',$data['city'])
                        ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereIn('bed',$data['bed']);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath',(int)$data['bath']);
                        })
                        ->get();
    }

    public function getByCityName($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->whereHas('city',function(Builder $query) use($data){
                            $query->where('name',$data['title']);
                        })
                        ->get();
    }
    public function getByStateName($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->whereHas('state',function(Builder $query) use($data){
                            $query->where('name',$data['title']);
                        })
                        ->get();
    }
    public function getByName($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('title',$data['property_name'])
                        ->get();
    }
    public function getByID($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('property_id',$data['property_id'])
                        ->get();
    }

    public function filterProperties($data)
    {
        $query = property::where('status', 1)
                        ->with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation');

        if($data['category'] != "")
        {
            $query = $query->where('category_id', $data['category']);
        }

        if($data['minPrice'] !="" && $data['maxPrice'] !="")
        {
            $cur = Session::get('currency');
            $min = (int)$data['minPrice'];
            $max = (int)$data['maxPrice'];
            if($cur != "USD")
            {
                $min = Currency::convert()
                            ->from($cur)
                            ->to('USD')
                            ->amount($min)
                            ->get();
                            return $cur;

                $max = Currency::convert()
                            ->from($cur)
                            ->to('USD')
                            ->amount($max)
                            ->get();
                    return $cur;
            }
            $query = $query->whereBetween('price', [$min, $max]);
        }

        if($data['city'] != "")
        {
            $query = $query->where('city_id',$data['city']);
        }

        if($data['minArea'] !="" && $data['maxArea'] !="")
        {
            $query = $query->whereHas('propertyDetails',function(Builder $query) use($data){
                    $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                });
        }

        if($data['bed'] != "")
        {
            $query = $query->whereHas('propertyDetails',function(Builder $query) use($data){
                $query->whereIn('bed',$data['bed']);
            });
        }

        if($data['bath'] != "")
        {
            $query = $query->whereHas('propertyDetails',function(Builder $query) use($data){
                $query->where('bath',(int)$data['bath']);
            });
        }

        if($data['title'] != "")
        {
            $query = $query->whereHas('city',function(Builder $query) use($data){
                $query->where('name',$data['title']);
            });
        }

        if($data['property_name'] != "")
        {
            $query = $query->where('title',$data['property_name']);
        }

        return $query->get();
    }

}
