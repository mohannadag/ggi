@extends('admin.main')
@push('styles')
     <style>
     .imgPreview img {
     padding: 8px;
    max-width: 100px;
     }
     </style>
    <style>
        .images-preview-div img {
            padding: 10px;
            max-width: 100px;
        }
    </style>
@endpush
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
            <div class="row">
                <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">

                        <div id="accordion1" class="pt-3">
                            <div class="card">
                                <div class="card-header" id="heading1">
                                    General Info
                                    <button type="button" class="btn btn-outline-dark float-right" data-toggle="collapse"
                                        data-target="#collapse1" aria-expanded="true"
                                        aria-controls="collapse1"></button>
                                </div>
                                <div id="collapse1" class="collapse show" aria-labelledby="heading1"
                                    data-parent="#accordion1">
                                    <div class="card-body">

                                        <div class="db-add-list-wrap">
                                            <div class="act-title">
                                                <h5>{{trans('admin.property-information')}} :</h5>
                                            </div>
                                            <div class="db-add-listing">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                        <input type="hidden" name="moderation_status" value="2">
                                                        <input type="hidden" name="status" value="1">
                                                        <input type="hidden" name="package_id" value="55">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Property Title</label> <span class="text-danger">*</span>
                                                            <input type="text" name="title" class="form-control filter-input"
                                                                value="{{ old('title') }}" placeholder="Property Title">
                                                            @error('title')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Property ID</label> <span class="text-danger">*</span>
                                                        <input type="text" name="property_id" class="form-control filter-input"
                                                            value="{{ old('property_id') }}" placeholder="Enter Property ID">
                                                        @error('property_id')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Is Featured</label><br>
                                                            <input id="is_featured" type="checkbox" name="is_featured" checked data-toggle="toggle"
                                                                data-on="yes" data-off="no" data-onstyle="success"
                                                                data-offstyle="danger">
                                                            @error('is_featured')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Property Type</label> <span class="text-danger">*</span>
                                                        <select name="type"
                                                            class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select</option>
                                                            <option value="{{ 'sale' }}" {{ old('type') == 'sale' ? 'selected' : '' }}>Sale</option>
                                                            <option value="{{ 'rent' }}" {{ old('type') == 'rent' ? 'selected' : '' }}>Rent</option>
                                                        </select>
                                                        @error('type')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Suitable for Citizenship?</label> <span class="text-danger">*</span>
                                                        <select name="citizenship"
                                                            class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select</option>
                                                            <option value="{{ '1' }}" {{ old('citizenship') == '1' ? 'selected' : '' }}>Yes</option>
                                                            <option value="{{ '2' }}" {{ old('citizenship') == '2' ? 'selected' : '' }}>No</option>
                                                        </select>
                                                        @error('type')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Tag:</label> <span class="text-danger">*</span>
                                                            <select name="tag" id="tag" class="form-control" multiple>
                                                                <option value="">Select</option>
                                                                @foreach($tags as $tag)
                                                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('tag')
                                                            <p class="text-danger">{{$message}}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Category</label> <span class="text-danger">*</span>
                                                        <select name="category_id" id="category_id" class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->category_id }}" {{ old('category_id') == $category->category_id ? 'selected' : '' }}> {{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Country:</label> <span class="text-danger">*</span>
                                                            <select name="country_id"
                                                                class="listing-input hero__form-input  form-control custom-select"
                                                                id="country">
                                                                <option value="">Select</option>
                                                                @foreach ($countries as $country)
                                                                    <option value="{{ $country->country_id }}" {{ old('country_id') == $country->country_id ? 'selected' : '' }}>{{ $country->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('country_id')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>State</label> <span class="text-danger">*</span>
                                                            <select name="state_id" class="listing-input hero__form-input  form-control custom-select" id="state">
                                                            </select>
                                                            @error('state_id')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>City</label> <span class="text-danger">*</span>
                                                            <select name="city_id"
                                                                class="listing-input hero__form-input  form-control custom-select"
                                                                id="city">
                                                            </select>
                                                            @error('city_id')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Property Price</label> <span class="text-danger">*</span>
                                                            <input type="text" name="price" class="form-control filter-input"
                                                                value="{{ old('price') }}" placeholder="$1500">
                                                            @error('price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Currency</label> <span class="text-danger">*</span>
                                                            <select name="currency_id"
                                                                class="listing-input hero__form-input  form-control custom-select">
                                                                {{-- <option value="">Select</option> --}}
                                                                @foreach ($currencies as $currency)
                                                                    <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                                                @endforeach
                                                                {{-- <option value="2" {{ old('currency_id') == "2" ? "selected" : "" }}>Euro</option> --}}
                                                            </select>
                                                            @error('currency_id')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Listing Size in Sq M2</label>
                                                            <input type="text" name="room_size" class="form-control filter-input"
                                                                value="{{ old('room_size') }}" placeholder="Enter Size in numbers">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-30">
                                                        <div class="form-group">
                                                            <label>Property Video Link</label>
                                                            <input type="text" name="video" class="form-control filter-input"
                                                                placeholder="Video Link Here" value="{{ old('video') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-30">
                                                        <div class="form-group">
                                                            <label>Drive Link</label>
                                                            <input type="text" name="drive_link" class="form-control filter-input"
                                                                placeholder="Google Link Here" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-30">
                                                        <div class="form-group">
                                                            <label>Drive-GGI</label>
                                                            <input type="text" name="plans_link" class="form-control filter-input"
                                                                placeholder="Floor Plans Link Here" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-30">
                                                        <div class="form-group">
                                                            <label>Word Link</label>
                                                            <input type="text" name="word_link" class="form-control filter-input"
                                                                placeholder="Word Link Here" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-30">
                                                        <div class="form-group">
                                                            <label>Prices Link</label>
                                                            <input type="text" name="prices_link" class="form-control filter-input"
                                                                placeholder="Prices Link Here" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-30">
                                                        <div class="form-group">
                                                            <label>Whatsapp Link</label>
                                                            <input type="text" name="whatsapp_link" class="form-control filter-input"
                                                                placeholder="Whatsapp Link Here" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-30">
                                                        <div class="form-group">
                                                            <label>Presentation Link</label>
                                                            <input type="text" name="presentation" class="form-control filter-input"
                                                                placeholder="Presentation Link Here" value="{{ old('link') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-30">
                                                        <div class="form-group">
                                                            <label>IVR Link</label>
                                                            <input type="text" name="ivr" class="form-control filter-input"
                                                                placeholder="Virtual Reality Link Here" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-30">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" name="address" class="form-control filter-input"
                                                                placeholder="address" value="{{ old('address') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="list_info">Description</label> <span class="text-danger">*</span>
                                                            <textarea name="description" class="form-control" id="list_info" rows="4" placeholder="Enter your text here">{!! old('description') !!}</textarea>
                                                            @error('description')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="list_info">Content</label> <span class="text-danger">*</span>
                                                            <textarea name="content" class="form-control tinymce" id="content" rows="4"
                                                                placeholder="Enter your text here">{!! old('content') !!}</textarea>
                                                            @error('content')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="list_info">Location Info</label> <span class="text-danger">*</span>
                                                            <textarea name="location_info" class="form-control tinymce" id="location_info" rows="4"
                                                                placeholder="Enter your text here">{!! old('location_info') !!}</textarea>
                                                            @error('location_info')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 border rounded-2 p-3">
                                                        <div class="form-group">
                                                            <label>Facilities</label>
                                                            <div class="row">
                                                                @foreach($facilities as $facility)
                                                                <div class="col-4">
                                                                    <input id="{{$facility->name}}" type="checkbox" name="facility_id[]" value="{{$facility->facility_id}}">
                                                                    <label for="{{$facility->name}}">{{$facility->name}}</label>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="db-add-list-wrap">


                                                        <div class="db-add-listing">
                                                            <div class="row">
                                                                <div class="col-md-12 mb-4">
                                                                    <div class="user-image mb-3 text-center">
                                                                        <img loading="lazy" src="" alt=""
                                                                            id="preview-image-before-upload">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="">Thumbnail Image</label> <span
                                                                            class="text-danger">*</span>
                                                                        <input type="file" name="thumbnail" class="form-control"
                                                                            id="photo-upload">
                                                                        @error('thumbnail')
                                                                            <p class="text-danger">{{ $message }}</p>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12 mb-5">
                                                                    <div class="act-title">
                                                                        <h5>Gallery :</h5>
                                                                    </div>
                                                                    {{-- <div class="user-image mb-3 text-center"> --}}
                                                                    {{-- <div class="imgPreview"> </div> --}}
                                                                    {{-- </div> --}}
                                                                    <div class="col-md-12">
                                                                        <div class="mt-1 text-center">
                                                                            <div class="images-preview-div"> </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="form-group">
                                                                            <div class="add-listing__input-file-box">
                                                                                <input class="add-listing__input-file" type="file"
                                                                                    name="images[]" multiple="multiple" id="images">
                                                                                <div class="add-listing__input-file-wrap">
                                                                                    <i class="lnr lnr-cloud-upload"></i>
                                                                                    <p>Click here to upload your images</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="accordion2" class="pt-3">
                            <div class="card">
                                <div class="card-header" id="heading2">
                                    Project Details
                                    <button type="button" class="btn btn-outline-dark float-right" data-toggle="collapse"
                                        data-target="#collapse2" aria-expanded="true"
                                        aria-controls="collapse2"></button>
                                </div>
                                <div id="collapse2" class="collapse" aria-labelledby="heading2"
                                    data-parent="#accordion2">
                                    <div class="card-body">

                                        <div class="db-add-list-wrap" id="property">
                                            <div class="act-title">
                                                <h5>Property Details :</h5>
                                            </div>
                                            <div class="db-add-listing">
                                                <div class="row mb-30">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Number of Bath</label>
                                                            <input type="number" name="bath" class="form-control filter-input"
                                                                value="{{ old('bath') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Number of Garages</label>
                                                            <input type="number" name="garage" class="form-control filter-input"
                                                                value="{{ old('garage') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Select Floor</label>
                                                        <input type="number" name="floor" class="form-control filter-input"
                                                            value="{{ old('floor') }}">
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Inside Project</label>
                                                        <select name="inside_project"
                                                            class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1" {{ old('inside_project') == 1 ? 'selected' : '' }}>No</option>
                                                            <option value="2" {{ old('inside_project') == 2 ? 'selected' : '' }}>Yes</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Cash Option</label>
                                                        <select name="cash" class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1" {{ old('cash') == 1 ? 'selected' : '' }}>No</option>
                                                            <option value="2" {{ old('cash') == 2 ? 'selected' : '' }}>Yes</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Installment Option</label>
                                                        <select name="installments"
                                                            class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1" {{ old('installments') == 1 ? 'selected' : '' }}>No</option>
                                                            <option value="2" {{ old('installments') == 2 ? 'selected' : '' }}>Yes</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Building Age</label>
                                                            <input type="number" name="building_age" class="form-control filter-input"
                                                                value="{{ old('building_age') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Apartment Status</label>
                                                        <select name="emptiness" class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1">Empty</option>
                                                            <option value="2">Occupied</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Balcony</label>
                                                        <select name="balcony" class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1">No</option>
                                                            <option value="2">Yes</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Exchangable</label>
                                                        <select name="convertability"
                                                            class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1">No</option>
                                                            <option value="2">Yes</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="db-add-list-wrap" id="project">
                                            <div class="act-title">
                                                <h5>Project Details:</h5>
                                            </div>
                                            <div class="db-add-listing">
                                                <div class="row mb-30">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Number of Blocks</label>
                                                            <input type="number" name="blocks" class="form-control filter-input"
                                                                value="{{ old('blocks') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Units Count</label>
                                                        <input type="number" name="total_units" class="form-control filter-input"
                                                            value="{{ old('total_units') }}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Units Per Floor</label>
                                                            <input type="number" name="units_infloors" class="form-control filter-input"
                                                                value="{{ old('units_infloors') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Delivery Month</label>
                                                            <input type="number" name="delivery_month" class="form-control filter-input"
                                                                value="{{ old('delivery_month') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Delivery Years</label>
                                                            <input type="number" name="deliver_year" class="form-control filter-input" value="{{ old('deliver_year') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>View</label>
                                                            <select name="view" class="listing-input hero__form-input  form-control custom-select">
                                                                <option value="">{{ trans('file.na') }}</option>
                                                                <option value="{{ '1' }}" {{ old('view') == '1' ? 'selected' : '' }}>{{ trans('file.na') }}</option>
                                                                <option value="{{ '2' }}" {{ old('view') == '2' ? 'selected' : '' }}> {{ trans('file.view_sea') }}</option>
                                                                <option value="{{ '3' }}" {{ old('view') == '3' ? 'selected' : '' }}> {{ trans('file.view_forest') }}</option>
                                                                <option value="{{ '4' }}" {{ old('view') == '4' ? 'selected' : '' }}> {{ trans('file.view_street') }}</option>
                                                                <option value="{{ '5' }}" {{ old('view') == '5' ? 'selected' : '' }}> {{ trans('file.view_landscape') }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Maintenance Fees</label>
                                                            <input type="number" name="maintenance_fee" class="form-control filter-input" value="{{ old('maintenance_fee') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Social Facilities Size</label>
                                                            <input type="number" name="landscape" class="form-control filter-input" value="{{ old('landscape') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Heating System</label>
                                                        <select name="heating" class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="{{ '1' }}" {{ old('heating') == '1' ? 'selected' : '' }}>{{ trans('file.na') }} </option>
                                                            <option value="{{ '2' }}" {{ old('heating') == '2' ? 'selected' : '' }}> {{ trans('file.central_heating') }}</option>
                                                            <option value="{{ '3' }}" {{ old('heating') == '3' ? 'selected' : '' }}> {{ trans('file.natural_gas') }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Title Deed Type</label>
                                                        <select name="title_deed_type" class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="{{ '1' }}" {{ old('title_deed_type') == '1' ? 'selected' : '' }}> Ready</option>
                                                            <option value="{{ '2' }}" {{ old('title_deed_type') == '2' ? 'selected' : '' }}> Under Construction</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Mortgage</label>
                                                        <select name="creditability" class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="{{ '1' }}" {{ old('creditability') == '1' ? 'selected' : '' }}>No</option>
                                                            <option value="{{ '2' }}" {{ old('creditability') == '2' ? 'selected' : '' }}>Yes</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label>Units Types</label>
                                                        <select name="bed" class="listing-input hero__form-input  form-control custom-select" multiple>
                                                                    <option value="">{{ trans('file.na') }}</option>
                                                                    <option value="[1]" >1+0</option>
                                                                    <option value="[2]" >1+1</option>
                                                                    <option value="[3]" >2+1</option>
                                                                    <option value="[4]" >3+1</option>
                                                                    <option value="[5]" >4+1</option>
                                                                    <option value="[6]" >5+1</option>
                                                                    <option value="[7]" >6+1</option>
                                                                    <option value="[8]" >7+1</option>
                                                                    <option value="[9]" >8+1</option>
                                                                </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="db-add-list-wrap" id="land">
                                            <div class="act-title">
                                                <h5>Land Details:</h5>
                                            </div>
                                            <div class="db-add-listing">
                                                <div class="row mb-30">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Island No</label>
                                                            <input type="number" name="island_no" class="form-control filter-input" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Sheet No</label>
                                                            <input type="number" name="sheet_no" class="form-control filter-input"
                                                                value="{{ old('sheet_no') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Precedent Value</label>
                                                            <input type="number" name="precedent_value"
                                                                class="form-control filter-input" value="{{ old('precedent_value') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Gauge</label>
                                                            <input type="number" name="gauge" class="form-control filter-input"
                                                                value="{{ old('gauge') }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Parcel Number</label>
                                                            <input type="number" name="parcel" class="form-control filter-input"
                                                                value="{{ old('parcels') }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Title Deed Type</label>
                                                        <select name="title_deed_type"
                                                            class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="{{ '1' }}"
                                                                {{ old('title_deed_type') == '1' ? 'selected' : '' }}>
                                                                {{ trans('file.condominium') }}</option>
                                                            <option value="{{ '2' }}"
                                                                {{ old('title_deed_type') == '2' ? 'selected' : '' }}>
                                                                {{ trans('file.easement') }}</option>
                                                            <option value="{{ '3' }}"
                                                                {{ old('title_deed_type') == '3' ? 'selected' : '' }}>
                                                                {{ trans('file.shared') }}</option>
                                                        </select>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="accordion4" class="pt-3">
                            <div class="card">
                                <div class="card-header" id="heading4">
                                    Floor Plans
                                    <button type="button" class="btn btn-outline-dark float-right" data-toggle="collapse"
                                        data-target="#collapse4" aria-expanded="true"
                                        aria-controls="collapse4"></button>
                                </div>
                                <div id="collapse4" class="collapse" aria-labelledby="heading4"
                                    data-parent="#accordion4">
                                    <div class="card-body">

                                        <div class="db-add-list-wrap">
                                            <div class="act-title">
                                                <h5>1st Floor Plans:</h5>
                                            </div>
                                            <div class="db-add-listing">
                                                <div class="row mb-30">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>1st Floor Title</label>
                                                            <input type="text" name="first_floor_title"
                                                                class="form-control filter-input"
                                                                value="{{ old('first_floor_title') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>1st Floor Sold?</label>
                                                        <select name="first_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1">No</option>
                                                            <option value="2">Yes</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>1st Floor Min. size</label>
                                                            <input type="number" name="first_floor_size" step="0.01"
                                                                class="form-control filter-input" value="{{ old('first_floor_size') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>1st Floor Max. size</label>
                                                            <input type="number" name="first_floor_max_size" step="0.01"
                                                                class="form-control filter-input" value="{{ old('first_floor_max_size') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>1st Floor Rooms</label>
                                                            <input type="number" name="first_floor_rooms"
                                                                class="form-control filter-input"
                                                                value="{{ old('first_floor_rooms') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>1st Floor Baths</label>
                                                            <input type="number" name="first_floor_baths"
                                                                class="form-control filter-input"
                                                                value="{{ old('first_floor_baths') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>1st Floor Price</label> <span class="text-danger">*</span>
                                                            <input type="number" name="first_floor_price"
                                                                class="form-control filter-input"
                                                                value="{{ old('first_floor_price') }}">
                                                            @error('price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>1st Floor Max. Price</label> <span class="text-danger">*</span>
                                                            <input type="number" name="first_floor_max_price"
                                                                class="form-control filter-input"
                                                                value="{{ old('first_floor_max_price') }}">
                                                            @error('first_floor_max_price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="user-image mb-3 text-center">
                                                                    <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="">1st Floor Image:(image/video)</label>
                                                                    <input type="file" name="first_floor_picture" class="form-control" id="photo-upload">
                                                                    @error('file')
                                                                    <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="db-add-list-wrap">
                                            <div class="act-title">
                                                <h5>2nd Floor Plans:</h5>
                                            </div>
                                            <div class="db-add-listing">
                                                <div class="row mb-30">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>2nd Floor Title</label>
                                                            <input type="text" name="second_floor_title"
                                                                class="form-control filter-input"
                                                                value="{{ old('second_floor_title') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>2nd Floor Sold?</label>
                                                        <select name="second_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1">No</option>
                                                            <option value="2">Yes</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>2nd Floor size</label>
                                                            <input type="number" name="second_floor_size" step="0.01"
                                                                class="form-control filter-input"
                                                                value="{{ old('second_floor_size') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>2nd Floor Max. size</label>
                                                            <input type="number" name="second_floor_max_size" step="0.01"
                                                                class="form-control filter-input"
                                                                value="{{ old('second_floor_max_size') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>2nd Floor Rooms</label>
                                                            <input type="number" name="second_floor_rooms"
                                                                class="form-control filter-input"
                                                                value="{{ old('second_floor_rooms') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>2nd Floor Baths</label>
                                                            <input type="number" name="second_floor_baths"
                                                                class="form-control filter-input"
                                                                value="{{ old('second_floor_baths') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>2nd Floor Min. Price</label> <span class="text-danger">*</span>
                                                            <input type="number" name="second_floor_price"
                                                                class="form-control filter-input"
                                                                value="{{ old('second_floor_price') }}">
                                                            @error('price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div><div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>2nd Floor Max. Price</label> <span class="text-danger">*</span>
                                                            <input type="number" name="second_floor_max_price"
                                                                class="form-control filter-input"
                                                                value="{{ old('second_floor_max_price') }}">
                                                            @error('price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="user-image mb-3 text-center">
                                                                    <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="">2nd Floor Image:(image/video)</label>
                                                                    <input type="file" name="second_floor_picture" class="form-control" id="photo-upload">
                                                                    @error('file')
                                                                    <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="db-add-list-wrap">
                                            <div class="act-title">
                                                <h5>3rd Floor Plan:</h5>
                                            </div>
                                            <div class="db-add-listing">
                                                <div class="row mb-30">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>3rd Floor Title</label>
                                                            <input type="text" name="third_floor_title"
                                                                class="form-control filter-input"
                                                                value="{{ old('third_floor_title') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>3rd Floor Sold?</label>
                                                        <select name="third_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1">No</option>
                                                            <option value="2">Yes</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>3rd Floor Min. size</label>
                                                            <input type="number" name="third_floor_size" step="0.01"
                                                                class="form-control filter-input" value="{{ old('third_floor_size') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>3rd Floor Max. size</label>
                                                            <input type="number" name="third_floor_max_size" step="0.01"
                                                                class="form-control filter-input" value="{{ old('third_floor_max_size') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>3rd Floor Rooms</label>
                                                            <input type="number" name="third_floor_rooms"
                                                                class="form-control filter-input"
                                                                value="{{ old('third_floor_rooms') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>3rd Floor Baths</label>
                                                            <input type="number" name="third_floor_baths"
                                                                class="form-control filter-input"
                                                                value="{{ old('third_floor_baths') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>3rd Floor Min. Price</label> <span class="text-danger">*</span>
                                                            <input type="number" name="third_floor_price"
                                                                class="form-control filter-input"
                                                                value="{{ old('third_floor_price') }}">
                                                            @error('price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>3rd Floor Max. Price</label> <span class="text-danger">*</span>
                                                            <input type="number" name="third_floor_max_price"
                                                                class="form-control filter-input"
                                                                value="{{ old('third_floor_max_price') }}">
                                                            @error('price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="user-image mb-3 text-center">
                                                                    <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="">3rd Floor Image:(image/video)</label>
                                                                    <input type="file" name="third_floor_picture" class="form-control" id="photo-upload">
                                                                    @error('file')
                                                                    <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="db-add-list-wrap">
                                            <div class="act-title">
                                                <h5>4th Floor Plan:</h5>
                                            </div>
                                            <div class="db-add-listing">
                                                <div class="row mb-30">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>4th Floor Title</label>
                                                            <input type="text" name="fourth_floor_title"
                                                                class="form-control filter-input"
                                                                value="{{ old('fourth_floor_title') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>4th Floor Sold?</label>
                                                        <select name="fourth_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1">No</option>
                                                            <option value="2">Yes</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>4th Floor Min. size</label>
                                                            <input type="number" name="fourth_floor_size" step="0.01"
                                                                class="form-control filter-input" value="{{ old('fourth_floor_size') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>4th Floor Max. size</label>
                                                            <input type="number" name="fourth_floor_max_size" step="0.01"
                                                                class="form-control filter-input" value="{{ old('fourth_floor_max_size') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>4th Floor Rooms</label>
                                                            <input type="number" name="fourth_floor_rooms"
                                                                class="form-control filter-input"
                                                                value="{{ old('fourth_floor_rooms') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>4th Floor Baths</label>
                                                            <input type="number" name="fourth_floor_baths"
                                                                class="form-control filter-input"
                                                                value="{{ old('fourth_floor_baths') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>4th Floor Min. Price</label> <span class="text-danger">*</span>
                                                            <input type="number" name="fourth_floor_price"
                                                                class="form-control filter-input"
                                                                value="{{ old('fourth_floor_price') }}">
                                                            @error('price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>4th Floor Max. Price</label> <span class="text-danger">*</span>
                                                            <input type="number" name="fourth_floor_max_price"
                                                                class="form-control filter-input"
                                                                value="{{ old('fourth_floor_max_price') }}">
                                                            @error('price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="user-image mb-3 text-center">
                                                                    <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="">4th Floor Image:(image/video)</label>
                                                                    <input type="file" name="fourth_floor_picture" class="form-control" id="photo-upload">
                                                                    @error('file')
                                                                    <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="db-add-list-wrap">
                                            <div class="act-title">
                                                <h5>5th Floor Plan:</h5>
                                            </div>
                                            <div class="db-add-listing">
                                                <div class="row mb-30">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>5th Floor Title</label>
                                                            <input type="text" name="fifth_floor_title"
                                                                class="form-control filter-input"
                                                                value="{{ old('fifth_floor_title') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>6th Floor Sold?</label>
                                                        <select name="fifth_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1">No</option>
                                                            <option value="2">Yes</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>5th Floor Min. size</label>
                                                            <input type="number" name="fifth_floor_size" step="0.01"
                                                                class="form-control filter-input" value="{{ old('fifth_floor_size') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>5th Floor Max. size</label>
                                                            <input type="number" name="fifth_floor_max_size" step="0.01"
                                                                class="form-control filter-input" value="{{ old('fifth_floor_max_size') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>5th Floor Rooms</label>
                                                            <input type="number" name="fifth_floor_rooms"
                                                                class="form-control filter-input"
                                                                value="{{ old('fifth_floor_rooms') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>5th Floor Baths</label>
                                                            <input type="number" name="fifth_floor_baths"
                                                                class="form-control filter-input"
                                                                value="{{ old('fifth_floor_baths') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>5th Floor Price</label> <span class="text-danger">*</span>
                                                            <input type="number" name="fifth_floor_price"
                                                                class="form-control filter-input"
                                                                value="{{ old('fifth_floor_price') }}">
                                                            @error('price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="user-image mb-3 text-center">
                                                                    <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">5th Floor Image:(image/video)</label>
                                                                    <input type="file" name="fifth_floor_picture" class="form-control" id="photo-upload">
                                                                    @error('file')
                                                                    <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="db-add-list-wrap">
                                            <div class="act-title">
                                                <h5>6th Floor Plan:</h5>
                                            </div>
                                            <div class="db-add-listing">
                                                <div class="row mb-30">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>6th Floor Title</label>
                                                            <input type="text" name="sixth_floor_title"
                                                                class="form-control filter-input"
                                                                value="{{ old('sixth_floor_title') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>6th Floor Sold?</label>
                                                        <select name="sixth_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1">No</option>
                                                            <option value="2">Yes</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>6th Floor Min. size</label>
                                                            <input type="number" name="sixth_floor_size" step="0.01"
                                                                class="form-control filter-input" value="{{ old('sixth_floor_size') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>6th Floor Max. size</label>
                                                            <input type="number" name="sixth_floor_max_size" step="0.01"
                                                                class="form-control filter-input" value="{{ old('sixth_floor_max_size') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>6th Floor Rooms</label>
                                                            <input type="number" name="sixth_floor_rooms"
                                                                class="form-control filter-input"
                                                                value="{{ old('sixth_floor_rooms') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>6th Floor Baths</label>
                                                            <input type="number" name="sixth_floor_baths"
                                                                class="form-control filter-input"
                                                                value="{{ old('sixth_floor_baths') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>6th Floor Max. Price</label> <span class="text-danger">*</span>
                                                            <input type="number" name="sixth_floor_price"
                                                                class="form-control filter-input"
                                                                value="{{ old('sixth_floor_price') }}">
                                                            @error('price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>6th Floor Max. Price</label> <span class="text-danger">*</span>
                                                            <input type="number" name="sixth_floor_max_price"
                                                                class="form-control filter-input"
                                                                value="{{ old('sixth_floor_max_price') }}">
                                                            @error('price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="user-image mb-3 text-center">
                                                                    <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="">6th Floor Image:(image/video)</label>
                                                                    <input type="file" name="sixth_floor_picture" class="form-control" id="photo-upload">
                                                                    @error('file')
                                                                    <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="db-add-list-wrap">
                                            <div class="act-title">
                                                <h5>7th Floor Plan:</h5>
                                            </div>
                                            <div class="db-add-listing">
                                                <div class="row mb-30">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>7th Floor Title</label>
                                                            <input type="text" name="seventh_floor_title"
                                                                class="form-control filter-input"
                                                                value="{{ old('seventh_floor_title') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>7th Floor Sold?</label>
                                                        <select name="seventh_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1">No</option>
                                                            <option value="2">Yes</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>7th Floor Min. size</label>
                                                            <input type="number" name="seventh_floor_size" step="0.01"
                                                                class="form-control filter-input" value="{{ old('seventh_floor_size') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>7th Floor Max. size</label>
                                                            <input type="number" name="seventh_floor_max_size" step="0.01"
                                                                class="form-control filter-input" value="{{ old('seventh_floor_max_size') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>7th Floor Rooms</label>
                                                            <input type="number" name="seventh_floor_rooms"
                                                                class="form-control filter-input"
                                                                value="{{ old('seventh_floor_rooms') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>7th Floor Baths</label>
                                                            <input type="number" name="seventh_floor_baths"
                                                                class="form-control filter-input"
                                                                value="{{ old('seventh_floor_baths') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>7th Floor Min. Price</label> <span class="text-danger">*</span>
                                                            <input type="number" name="seventh_floor_price"
                                                                class="form-control filter-input"
                                                                value="{{ old('seventh_floor_price') }}">
                                                            @error('price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>7th Floor Min. Price</label> <span class="text-danger">*</span>
                                                            <input type="number" name="seventh_floor_max_price"
                                                                class="form-control filter-input"
                                                                value="{{ old('seventh_floor_max_price') }}">
                                                            @error('price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="user-image mb-3 text-center">
                                                                    <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="">7th Floor Image:(image/video)</label>
                                                                    <input type="file" name="seventh_floor_picture" class="form-control" id="photo-upload">
                                                                    @error('file')
                                                                    <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="db-add-list-wrap">
                                            <div class="act-title">
                                                <h5>8th Floor Plan:</h5>
                                            </div>
                                            <div class="db-add-listing">
                                                <div class="row mb-30">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>8th Floor Title</label>
                                                            <input type="text" name="eighth_floor_title"
                                                                class="form-control filter-input"
                                                                value="{{ old('eighth_floor_title') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>8th Floor Sold?</label>
                                                        <select name="eighth_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1">No</option>
                                                            <option value="2">Yes</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>8th Floor Min. size</label>
                                                            <input type="number" name="eighth_floor_size" step="0.01"
                                                                class="form-control filter-input" value="{{ old('eighth_floor_size') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>8th Floor Max. size</label>
                                                            <input type="number" name="eighth_floor_max_size" step="0.01"
                                                                class="form-control filter-input" value="{{ old('eighth_floor_max_size') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>8th Floor Rooms</label>
                                                            <input type="number" name="eighth_floor_rooms"
                                                                class="form-control filter-input"
                                                                value="{{ old('eighth_floor_rooms') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>8th Floor Baths</label>
                                                            <input type="number" name="eighth_floor_baths"
                                                                class="form-control filter-input"
                                                                value="{{ old('eighth_floor_baths') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>8th Floor Min. Price</label> <span class="text-danger">*</span>
                                                            <input type="number" name="eighth_floor_price"
                                                                class="form-control filter-input"
                                                                value="{{ old('eighth_floor_price') }}">
                                                            @error('price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>8th Floor Max. Price</label> <span class="text-danger">*</span>
                                                            <input type="number" name="eighth_floor_max_price"
                                                                class="form-control filter-input"
                                                                value="{{ old('eighth_floor_max_price') }}">
                                                            @error('price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="user-image mb-3 text-center">
                                                                    <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="">8th Floor Image:(image/video)</label>
                                                                    <input type="file" name="eighth_floor_picture" class="form-control" id="photo-upload">
                                                                    @error('file')
                                                                    <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="db-add-list-wrap">
                                            <div class="act-title">
                                                <h5>9th Floor Plan:</h5>
                                            </div>
                                            <div class="db-add-listing">
                                                <div class="row mb-30">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>9th Floor Title</label>
                                                            <input type="text" name="ninth_floor_title"
                                                                class="form-control filter-input"
                                                                value="{{ old('ninth_floor_title') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>9th Floor Sold?</label>
                                                        <select name="ninth_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1">No</option>
                                                            <option value="2">Yes</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>9th Floor Min. size</label>
                                                            <input type="number" name="ninth_floor_size" step="0.01"
                                                                class="form-control filter-input" value="{{ old('ninth_floor_size') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>9th Floor Max. size</label>
                                                            <input type="number" name="ninth_floor_max_size" step="0.01"
                                                                class="form-control filter-input" value="{{ old('ninth_floor_max_size') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>9th Floor Rooms</label>
                                                            <input type="number" name="ninth_floor_rooms"
                                                                class="form-control filter-input"
                                                                value="{{ old('ninth_floor_rooms') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>9th Floor Baths</label>
                                                            <input type="number" name="ninth_floor_baths"
                                                                class="form-control filter-input"
                                                                value="{{ old('ninth_floor_baths') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>9th Floor Min. Price</label> <span class="text-danger">*</span>
                                                            <input type="number" name="ninth_floor_price"
                                                                class="form-control filter-input"
                                                                value="{{ old('ninth_floor_price') }}">
                                                            @error('price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>9th Floor Max. Price</label> <span class="text-danger">*</span>
                                                            <input type="number" name="ninth_floor_max_price"
                                                                class="form-control filter-input"
                                                                value="{{ old('ninth_floor_max_price') }}">
                                                            @error('price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="user-image mb-3 text-center">
                                                                    <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="">9th Floor Image:(image/video)</label>
                                                                    <input type="file" name="ninth_floor_picture" class="form-control" id="photo-upload">
                                                                    @error('file')
                                                                    <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="db-add-list-wrap">
                                            <div class="act-title">
                                                <h5>10th Floor Plan:</h5>
                                            </div>
                                            <div class="db-add-listing">
                                                <div class="row mb-30">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>10th Floor Title</label>
                                                            <input type="text" name="tenth_floor_title"
                                                                class="form-control filter-input"
                                                                value="{{ old('tenth_floor_title') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>10th Floor Sold?</label>
                                                        <select name="tenth_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1">No</option>
                                                            <option value="2">Yes</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>10th Floor Min. size</label>
                                                            <input type="number" name="tenth_floor_size" step="0.01"
                                                                class="form-control filter-input" value="{{ old('tenth_floor_size') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>10th Floor Max. size</label>
                                                            <input type="number" name="tenth_floor_max_size" step="0.01"
                                                                class="form-control filter-input" value="{{ old('tenth_floor_max_size') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>10th Floor Rooms</label>
                                                            <input type="number" name="tenth_floor_rooms"
                                                                class="form-control filter-input"
                                                                value="{{ old('tenth_floor_rooms') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>10th Floor Baths</label>
                                                            <input type="number" name="tenth_floor_baths"
                                                                class="form-control filter-input"
                                                                value="{{ old('tenth_floor_baths') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>10th Floor Min. Price</label> <span class="text-danger">*</span>
                                                            <input type="number" name="tenth_floor_price"
                                                                class="form-control filter-input"
                                                                value="{{ old('tenth_floor_price') }}">
                                                            @error('price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>10th Floor Max. Price</label> <span class="text-danger">*</span>
                                                            <input type="number" name="tenth_floor_max_price"
                                                                class="form-control filter-input"
                                                                value="{{ old('tenth_floor_max_price') }}">
                                                            @error('price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="user-image mb-3 text-center">
                                                                    <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="">10th Floor Image:(image/video)</label>
                                                                    <input type="file" name="tenth_floor_picture" class="form-control" id="photo-upload">
                                                                    @error('file')
                                                                    <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="db-add-list-wrap">
                                            <div class="act-title">
                                                <h5>11th Floor Plan:</h5>
                                            </div>
                                            <div class="db-add-listing">
                                                <div class="row mb-30">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>11th Floor Title</label>
                                                            <input type="text" name="eleventh_floor_title"
                                                                class="form-control filter-input"
                                                                value="{{ old('eleventh_floor_title') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>11th Floor Sold?</label>
                                                        <select name="eleventh_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1">No</option>
                                                            <option value="2">Yes</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>11th Floor Min. size</label>
                                                            <input type="number" name="eleventh_floor_size" step="0.01"
                                                                class="form-control filter-input" value="{{ old('eleventh_floor_size') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>11th Floor Max. size</label>
                                                            <input type="number" name="eleventh_floor_max_size" step="0.01"
                                                                class="form-control filter-input" value="{{ old('eleventh_floor_max_size') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>11th Floor Rooms</label>
                                                            <input type="number" name="eleventh_floor_rooms"
                                                                class="form-control filter-input"
                                                                value="{{ old('eleventh_floor_rooms') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>11th Floor Baths</label>
                                                            <input type="number" name="eleventh_floor_baths"
                                                                class="form-control filter-input"
                                                                value="{{ old('eleventh_floor_baths') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>11th Floor Min. Price</label> <span class="text-danger">*</span>
                                                            <input type="number" name="eleventh_floor_price"
                                                                class="form-control filter-input"
                                                                value="{{ old('eleventh_floor_price') }}">
                                                            @error('price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>11th Floor Max. Price</label> <span class="text-danger">*</span>
                                                            <input type="number" name="eleventh_floor_max_price"
                                                                class="form-control filter-input"
                                                                value="{{ old('eleventh_floor_max_price') }}">
                                                            @error('price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="user-image mb-3 text-center">
                                                                    <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="">11th Floor Image:(image/video)</label>
                                                                    <input type="file" name="eleventh_floor_picture" class="form-control" id="photo-upload">
                                                                    @error('file')
                                                                    <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="db-add-list-wrap">
                                            <div class="act-title">
                                                <h5>12th Floor Plan:</h5>
                                            </div>
                                            <div class="db-add-listing">
                                                <div class="row mb-30">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>12th Floor Title</label>
                                                            <input type="text" name="twelfth_floor_title"
                                                                class="form-control filter-input"
                                                                value="{{ old('twelfth_floor_title') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>12th Floor Sold?</label>
                                                        <select name="twelfth_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1">No</option>
                                                            <option value="2">Yes</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>12th Floor Min. size</label>
                                                            <input type="number" name="twelfth_floor_size" step="0.01"
                                                                class="form-control filter-input" value="{{ old('twelfth_floor_size') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>12th Floor Max. size</label>
                                                            <input type="number" name="twelfth_floor_max_size" step="0.01"
                                                                class="form-control filter-input" value="{{ old('twelfth_floor_max_size') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>12th Floor Rooms</label>
                                                            <input type="number" name="twelfth_floor_rooms"
                                                                class="form-control filter-input"
                                                                value="{{ old('twelfth_floor_rooms') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>12th Floor Baths</label>
                                                            <input type="number" name="twelfth_floor_baths"
                                                                class="form-control filter-input"
                                                                value="{{ old('twelfth_floor_baths') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>12th Floor Min. Price</label> <span class="text-danger">*</span>
                                                            <input type="number" name="twelfth_floor_price"
                                                                class="form-control filter-input"
                                                                value="{{ old('twelfth_floor_price') }}">
                                                            @error('price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>12th Floor Max. Price</label> <span class="text-danger">*</span>
                                                            <input type="number" name="twelfth_floor_max_price"
                                                                class="form-control filter-input"
                                                                value="{{ old('twelfth_floor_max_price') }}">
                                                            @error('price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="user-image mb-3 text-center">
                                                                    <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="">12th Floor Image:(image/video)</label>
                                                                    <input type="file" name="twelfth_floor_picture" class="form-control" id="photo-upload">
                                                                    @error('file')
                                                                    <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="db-add-list-wrap pt-3">
                            <div class="db-add-listing">
                                <div class="row">
                                    <div class="col-md-12 text-right sm-left">
                                        <button class="btn v3" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
    <script>
        tinymce.init({
            selector: '#content', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>

<script>
        tinymce.init({
            selector: '#location_info', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>

    {{-- <!--CKEditor JS-->
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script> --}}

    <script>
        $(document).on('change', '#country', function() {
            var country = $(this).val();
            $.ajax({
                method: 'post',
                url: '{{ route('admin.get.state') }}',
                data: {
                    country: country,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: 'html',
                success: function(response) {
                    $('#state').html(response);
                    $('#state').selectpicker('refresh');
                }
            });
        });
    </script>

    <script>
        $(document).on('change', '#state', function() {
            var state = $(this).val();
            $.ajax({
                method: 'post',
                url: '{{ route('admin.get.city') }}',
                data: {
                    state: state,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: 'html',
                success: function(response) {
                    $('#city').html(response);
                    $('#city').selectpicker('refresh');
                }
            });
        });

    </script>

<script>
    $(document).on('change', '#category_id', function() {
        var propertyType = $(this).val();
        // alert(propertyType);
        if (propertyType == 1 || propertyType == 4) {
            $("#property").show();
            $("#land").hide();
            $("#project").hide();
        } else {
            $("#property").hide();
        }
    });
</script>
<script>
    $(document).on('change', '#category_id', function() {
        var propertyType = $(this).val();
        // alert(propertyType);
        if (propertyType == 5 || propertyType == 4) {
            $("#property").hide();
            $("#land").hide();
            $("#project").show();
        } else {
            $("#project").hide();
        }
    });
</script>

    <script>
        (function($) {
            "use strict";
            // Multiple images preview with JavaScript
            //        var multiImgPreview = function(input, imgPreviewPlaceholder) {
            //
            //            if (input.files) {
            //                var filesAmount = input.files.length;
            //                for (i = 0; i < filesAmount; i++) {
            //                    var reader = new FileReader();
            //                    reader.onload = function(event) {
            //                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
            //                    }
            //                    reader.readAsDataURL(input.files[i]);
            //                }
            //            }
            //        };

            //        $('#images').on('change', function() {
            //            multiImgPreview(this, 'div.imgPreview');
            //        });
            $('#photo-upload').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

        })(jQuery);
    </script>
    <script>
        $(function() {
            // Multiple images preview with JavaScript
            var previewImages = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#images').on('change', function() {
                previewImages(this, 'div.images-preview-div');
            });
        });

        $('#is_featured').prop('checked', false);
    </script>
@endpush
