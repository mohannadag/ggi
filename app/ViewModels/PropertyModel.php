<?php
namespace App\ViewModels;

use App\Models\Image;
use App\Services\PropertyService;
use App\Traits\ImageUpload;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class PropertyModel implements IPropertyModel
{
    use ImageUpload;
    private $_propertyService;
    public function __construct(PropertyService $service)
    {
        $this->_propertyService = $service;
    }

    public function getAll(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $user = auth()->user();
        if($user->type == 'admin')
        {
            $data = $this->_propertyService->getAll();
        }else{
            $data = $this->_propertyService->getAll();
        }
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('user', function ($row) use($locale){
                return $row->user->username;
            })
            ->addColumn('title', function ($row) use ($locale)
            {
                return $row->propertyTranslation->title ?? $row->propertyTranslationEnglish->title ?? null;
            })
            ->addColumn('property_id', function ($row) use ($locale)
            {
                return $row->property_id;
            })
            ->addColumn('category', function ($row) use($locale){
                return $row->category->categoryTranslation->name ?? $row->category->categoryTranslationEnglish->name ?? null;
            })
            ->addColumn('package', function ($row) use($locale){
                return $row->package->package->packageTranslation->name ?? $row->package->package->packageTranslationEnglish->name ?? null;
            })
            ->addColumn('status',function($row){
                $currentTime = Carbon::now();
                $end_time = new Carbon($row->package->expire_at);
                if($currentTime > $end_time)
                {
                    $row->status = 0;
                    $row->save();
                }
                if($row->status == 0){
                    $but = '<span class="bg-danger p-1 text-white">Expired</span>';
                    return $but;
                }
                if($row->status == 1)
                {
                    $but =  '<span class="bg-success p-1 text-white">Active</span>';
                    return $but;
                }
                if($row->status == 2){
                    $but = '<span class="bg-warning p-1 text-white">Pending</span>';
                    return $but;
                }
            })
            ->addColumn('action1',function($row){
                if($row->moderation_status == 1)
                {
                    $currentTime = Carbon::now();
                    $end_time = new Carbon($row->package->expire_at);
                    if($currentTime > $end_time)
                    {
                        $but = '<span class="bg-danger p-1 text-white">Expired</span>';
                        return $but;
                    }else{
                        $but =  '<span class="bg-success p-1 text-white">Approved</span>';
                        return $but;
                    }

                }else{
                    if($row->package->is_expired == 0 )
                    {
                        $but = '<span class="bg-warning p-1 text-white">Pending</span>';
                        return $but;
                    }else{
                        $but = '<span class="bg-danger p-1 text-white">Expired</span>';
                        return $but;
                    }

                }
            })
            ->addColumn('remainingTime',function($row){
                if($row->moderation_status == 1)
                {
                    $currentTime = Carbon::now();
                    $end_time = new Carbon($row->package->expire_at);
                    if($currentTime > $end_time)
                    {
                        return '00:00:00';
                    }else{
                        return  $remainingTime = $end_time->diff($currentTime)->format('%H:%I:%S');
                    }
                }else{
                    if($row->package->is_expired == 0)
                    {
                        $but = '<span class="bg-warning p-1 text-white">Pending</span>';
                        return $but;
                    }else{
                        return '00:00:00';
                    }
                }
            })
            ->addColumn('featured',function($row){
                if($row->is_featured == 1)
                {
                    $but =  '<span class="bg-primary p-1 text-white">Featured</span>';
                    return $but;
                }else{
                    $but = '<span class="bg-warning p-1 text-white">Not Featured</span>';
                    return $but;
                }
            })
            ->addColumn('action', function($row){
                $actionBtn = '<div class="d-flex justify-content-end">
                <a href="'.route('front.property', ['property' => $row->id]).'" class="edit btn btn-success btn-sm" target="_blank"><i class="la la-eye"></i></a> |
                  <a href="'.route('admin.properties.edit',$row->id).'" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>
                 | <form action="'.route('admin.properties.destroy',$row->id).'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
               <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
                </form></div>';
                return $actionBtn;
            })
            ->rawColumns(['status','action','action1','remainingTime','featured'])
            ->make(true);
    }

    public function getById($id)
    {
        return $this->_propertyService->getById($id);
    }

    public function add(Request $request)
    {
        request()->validate([
            'user_id' => 'required',
            'title'=> 'required',
            'type'=> 'required',
            'category_id'=> 'required',
            'price'=> 'required',
            'tag'=>'nullable',
            'currency_id'=> 'nullable',
            'status'=> 'required',
            'is_featured'=> 'nullable',
            'property_id' => 'required',
            'moderation_status'=> 'nullable',
            'description'=> 'nullable',
            'background_image'=> 'nullable',
        ],[
            'type.required'=> 'The property type field is required',
            'category_id.required'=> 'The category field is required',
            'currency_id.required'=> 'The currency field is required',
        ]);

        //thumbnail image save start
        $thumbnailImage = $request->file('thumbnail');
        $slug = $request->input('title');
        $thumbnailName = $this->imageUpload($thumbnailImage,$slug,'thumbnail',750,500) ?? '';

        $propertyFloors = [];
        foreach($request->addMoreInputFields as $key => $value)
        {
            if(isset($value['image']))
                $value['image'] = $this->imageUpload($value['image'],$slug,'floors',780, 540);

            array_push($propertyFloors, $value);
        }


        $backgroundImageName = $this->imageUpload($thumbnailImage,$slug,'backgroundImage',1400,700) ?? '';
        //thumbnail image save end


        $dataProperty = [];
        $dataProperty['user_id'] = $request->input('user_id');
        $dataProperty['property_id'] = $request->input('property_id');
        $dataProperty['category_id'] = $request->input('category_id');
        $dataProperty['tag'] = $request->input('tag');
        $dataProperty['country_id'] = $request->input('country_id');
        $dataProperty['city_id'] = $request->input('city_id');
        $dataProperty['state_id'] = $request->input('state_id');
        $dataProperty['currency_id'] = $request->input('currency_id');
        $dataProperty['title'] = $request->input('title');
        $dataProperty['type'] = $request->input('type');
        $dataProperty['lat'] = $request->input('lat') ?? '';
        $dataProperty['lon'] = $request->input('lon') ?? '';
        $dataProperty['price'] = $request->input('price') ?? 'NULL';
        $dataProperty['status'] = $request->input('status');
        $dataProperty['moderation_status'] = $request->input('moderation_status');
        $dataProperty['is_featured'] = (int) $request->has('is_featured');
        $dataProperty['description'] = $request->input('description');
        $dataProperty['package_id'] = $request->input('package_id');
        $dataProperty['facility_id'] = $request->input('facility_id');
        $dataProperty['thumbnail'] = $thumbnailName;
        $dataProperty['background_image'] = $backgroundImageName;
        $locale = Session::get('currentLocal');
        $dataProperty['locale'] = $locale;

        // gallery image save start
        if($request->hasfile('images')) {
            foreach($request->file('images') as $file)
            {
                Carbon::now()->toDateString();
                $name = 'gallery-'.uniqid();
                $galleryImage = \Intervention\Image\Facades\Image::make($file)->encode('jpg', 90)->resize(750, 500)->save(public_path('images/gallery/'  .  $name . '.jpg'));
                $imgData[] = $galleryImage->basename;
            }
            $imgData = json_encode($imgData);
        }else{
            $imgData = "";
        }
        // gallery image save end

        $dataPropertyDetail = [];
        $dataPropertyDetail['bed'] = $request->input('bed');
        $dataPropertyDetail['bath'] = $request->input('bath');
        $dataPropertyDetail['garage'] = $request->input('garage');
        $dataPropertyDetail['blocks'] = $request->input('blocks');
        $dataPropertyDetail['parcel'] = $request->input('parcel');
        $dataPropertyDetail['floor'] = $request->input('floor');
        $dataPropertyDetail['room_size'] = $request->input('room_size');
        $dataPropertyDetail['content'] = $request->input('content') ?? '';
        $dataPropertyDetail['video'] = $request->input('video');
        $dataPropertyDetail['landscape'] = $request->input('landscape');
        $dataPropertyDetail['view'] = $request->input('view');
        $dataPropertyDetail['available_floors'] = $request->input('available_floors');
        $dataPropertyDetail['balcony'] = $request->input('balcony');
        $dataPropertyDetail['heating'] = $request->input('heating');
        $dataPropertyDetail['emptiness'] = $request->input('emptiness');
        $dataPropertyDetail['cash'] = $request->input('cash') ?? '';
        $dataPropertyDetail['citizenship'] = $request->input('citizenship') ?? '';
        $dataPropertyDetail['installments'] = $request->input('installments') ?? '';
        $dataPropertyDetail['maintenance_fee'] = $request->input('maintenance_fee');
        $dataPropertyDetail['creditability'] = $request->input('creditability');
        $dataPropertyDetail['presentation'] = $request->input('presentation');
        $dataPropertyDetail['building_age'] = $request->input('building_age');
        $dataPropertyDetail['units_infloors'] = $request->input('units_infloors');
        $dataPropertyDetail['convertability'] = $request->input('convertability');
        $dataPropertyDetail['total_units'] = $request->input('total_units');
        $dataPropertyDetail['title_deed_type'] = $request->input('title_deed_type');
        $dataPropertyDetail['delivery_month'] = $request->input('delivery_month');
        $dataPropertyDetail['deliver_year'] = $request->input('deliver_year');
        $dataPropertyDetail['payment_options'] = $request->input('payment_options');
        $dataPropertyDetail['inside_project'] = $request->input('inside_project');
        $dataPropertyDetail['island_no'] = $request->input('island_no') ?? '';
        $dataPropertyDetail['sheet_no'] = $request->input('sheet_no') ?? '';
        $dataPropertyDetail['precedent_value'] = $request->input('precedent_value') ?? '';
        $dataPropertyDetail['gauge'] = $request->input('gauge') ?? '';



        $dataPropertyDetail['locale'] = $locale;
        $dataPropertyDetail['ivr'] = $request->input('ivr');
        $dataPropertyDetail['drive_link'] = $request->input('drive_link');
        $dataPropertyDetail['plans_link'] = $request->input('plans_link');
        $dataPropertyDetail['word_link'] = $request->input('word_link');
        $dataPropertyDetail['prices_link'] = $request->input('prices_link');
        $dataPropertyDetail['whatsapp_link'] = $request->input('whatsapp_link');
        $dataPropertyDetail['location_info'] = $request->input('location_info');

        $this->_propertyService->add($dataProperty,$dataPropertyDetail,$imgData,$propertyFloors);
    }

    public function update(Request $request, $id)
    {
        $property = $this->_propertyService->getById($id);
        $user = auth()->user();
        //thumbnail image update start
        $thumbnailImage = $request->file('thumbnail');

        $slug =  $request->input('title');


        $thumbnailName = $this->propertyImageUpdate($thumbnailImage,$slug,$property,'thumbnail',750,500);

        $backgroundImageName = $this->propertyImageUpdate($thumbnailImage,$slug,$property,'backgroundImage',1400,700);

        $propertyFloors = [];
        // dd($request->addMoreInputFields);
        foreach($request->addMoreInputFields as $key => $value)
        {
            if(isset($value['image']))
                $value['image'] = $this->imageUpload($value['image'],$slug,'floors',780, 540);
            array_push($propertyFloors, $value);
        }


        //thumbnail image save end
        $dataProperty = [];
        if($user->type !== 'admin'){
            $dataProperty['moderation_status'] = $property['moderation_status'];
            $dataProperty['status'] = 1;
        }else{
            $dataProperty['moderation_status'] = $request->input('moderation_status');
            $dataProperty['status'] = 1;
        }

        $dataProperty['user_id'] = $request->input('user_id');
        $dataProperty['property_id'] = $request->input('property_id');
        $dataProperty['category_id'] = $request->input('category_id');
        $dataProperty['tag'] = $request->input('tag');
        $dataProperty['country_id'] = $request->input('country_id');
        $dataProperty['city_id'] = $request->input('city_id');
        $dataProperty['state_id'] = $request->input('state_id');
        $dataProperty['currency_id'] = $request->input('currency_id');
        $dataProperty['title'] = $request->input('title');
        $dataProperty['type'] = $request->input('type');
        $dataProperty['lat'] = $request->input('lat') ?? '';
        $dataProperty['lon'] = $request->input('lon') ?? '';
        $dataProperty['price'] = $request->input('price') ?? 'NULL';
        // $dataProperty['status'] = $property['status'];
        // $dataProperty['moderation_status'] =$property['moderation_status'];
        $dataProperty['is_featured'] = (int) $request->has('is_featured');
        $dataProperty['description'] = $request->input('description');
        $dataProperty['package_id'] = $request->input('package_id');
        $dataProperty['facility_id'] = $request->input('facility_id');
        $dataProperty['thumbnail'] = $thumbnailName;
        $dataProperty['background_image'] = $backgroundImageName;
        $dataProperty['locale'] = $request->input('local');
        $dataProperty['propertyId'] = $property['id'];
        $dataPropertyDetail = [];
        $dataPropertyDetail['bed'] = $request->input('bed');
        $dataPropertyDetail['bath'] = $request->input('bath');
        $dataPropertyDetail['garage'] = $request->input('garage');
        $dataPropertyDetail['blocks'] = $request->input('blocks') ?? '';
        $dataPropertyDetail['parcel'] = $request->input('parcel') ?? '';
        $dataPropertyDetail['landscape'] = $request->input('landscape') ?? '';
        $dataPropertyDetail['view'] = $request->input('view') ?? '';
        $dataPropertyDetail['cash'] = $request->input('cash') ?? '';
        $dataPropertyDetail['citizenship'] = $request->input('citizenship') ?? '';
        $dataPropertyDetail['installments'] = $request->input('installments') ?? '';
        $dataPropertyDetail['available_floors'] = $request->input('available_floors') ?? '';
        $dataPropertyDetail['balcony'] = $request->input('balcony') ?? '';
        $dataPropertyDetail['presentation'] = $request->input('presentation');
        $dataPropertyDetail['heating'] = $request->input('heating') ?? '';
        $dataPropertyDetail['emptiness'] = $request->input('emptiness') ?? '';
        $dataPropertyDetail['maintenance_fee'] = $request->input('maintenance_fee') ?? '';
        $dataPropertyDetail['creditability'] = $request->input('creditability') ?? '';
        $dataPropertyDetail['building_age'] = $request->input('building_age') ?? '';
        $dataPropertyDetail['units_infloors'] = $request->input('units_infloors') ?? '';
        $dataPropertyDetail['convertability'] = $request->input('convertability') ?? '';
        $dataPropertyDetail['total_units'] = $request->input('total_units') ?? '';
        $dataPropertyDetail['title_deed_type'] = $request->input('title_deed_type') ?? '';
        $dataPropertyDetail['delivery_month'] = $request->input('delivery_month') ?? '';
        $dataPropertyDetail['deliver_year'] = $request->input('deliver_year') ?? '';
        $dataPropertyDetail['payment_options'] = $request->input('payment_options') ?? '';
        $dataPropertyDetail['inside_project'] = $request->input('inside_project') ?? '';
        $dataPropertyDetail['island_no'] = $request->input('island_no') ?? '';
        $dataPropertyDetail['sheet_no'] = $request->input('sheet_no')  ?? '';
        $dataPropertyDetail['precedent_value'] = $request->input('precedent_value') ?? '';
        $dataPropertyDetail['gauge'] = $request->input('gauge') ?? '';

        $dataPropertyDetail['floor'] = $request->input('floor');
        $dataPropertyDetail['room_size'] = $request->input('room_size');
        $dataPropertyDetail['content'] = $request->input('content') ?? '';
        $dataPropertyDetail['video'] = $request->input('video');
        $dataPropertyDetail['locale'] = $request->input('local');
        $dataPropertyDetail['ivr'] = $request->input('ivr');
        $dataPropertyDetail['drive_link'] = $request->input('drive_link');
        $dataPropertyDetail['plans_link'] = $request->input('plans_link');
        $dataPropertyDetail['word_link'] = $request->input('word_link');
        $dataPropertyDetail['prices_link'] = $request->input('prices_link');
        $dataPropertyDetail['whatsapp_link'] = $request->input('whatsapp_link');
        $dataPropertyDetail['location_info'] = $request->input('location_info');

        // $dataProperty['excludeImages'] = $request->excludeImages;
        $dataProperty['oldImages'] = $request->oldImages;



        if($request->hasfile('images')) {

            foreach($request->file('images') as $file)
            {
                // File::delete(public_path() . "/images/gallery/{$property->image}");
                Carbon::now()->toDateString();
                $name = 'gallery-'.uniqid();
                $galleryImage = \Intervention\Image\Facades\Image::make($file)->encode('jpg', 90)->resize(750, 500)->save(public_path('images/gallery/'  .  $name . '.jpg'));
                $imgData[] = $galleryImage->basename;
            }

            if($dataProperty['oldImages']) {
                $finalImages = array_merge($dataProperty['oldImages'],$imgData);
            } else {
                $finalImages = $imgData;
            }

            $fileModal = Image::where('property_id',$id)->first();
            $fileModal->property_id = $id;

            $fileModal->name = json_encode($finalImages);
            $fileModal->image_path = json_encode($finalImages);

            $fileModal->save();

        }else{
            $imgData = "default.png";
        }
        $this->_propertyService->update($dataProperty, $dataPropertyDetail, $propertyFloors, $id);
    }

    public function updateModerationStatus(Request $request, $id)
    {
        $data = [];
        $data['moderation_status'] = $request->input('moderation_status');
        $data['status'] = 1;
        $this->_propertyService->updateModerationStatus($data,$id);
    }

    public function delete($id)
    {
        $property = $this->_propertyService->getById($id);
        File::delete(public_path() . "/images/thumbnail/{$property->thumbnail}");
        File::delete(public_path() . "/images/backgroundImage/{$property->background_image}");
        $this->_propertyService->delete($id);
    }
}
