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
                <form action="{{ route('admin.properties.update', $property->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="local" value="{{ $locale }}">
                    {{-- <div class="col-md-12"> --}}





                    <div id="accordion1">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                General Info
                                <button type="button" class="btn btn-outline-dark float-right" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne"></button>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordion1">
                                <div class="card-body">
                                    <div class="db-add-list-wrap">
                                        <div class="act-title">
                                            <h5>Edit Property Information :</h5>
                                        </div>
                                        <div class="db-add-listing">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="user_id"
                                                        value="{{ $property->user_id }}">
                                                    <input type="hidden" name="package_id"
                                                        value="{{ $property->package_id }}">
                                                </div>
                                                @can('isAdmin')
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Moderation Status</label>
                                                            <select name="moderation_status"
                                                                class="listing-input hero__form-input  form-control custom-select">
                                                                <option value="">Select</option>
                                                                <option value="0"
                                                                    {{ $property->moderation_status == '0' ? 'selected' : '' }}>
                                                                    Pending</option>
                                                                <option value="1"
                                                                    {{ $property->moderation_status == '1' ? 'selected' : '' }}>
                                                                    Approved</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endcan
                                                @can('isMod')
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Moderation Status</label>
                                                            <select name="moderation_status"
                                                                class="listing-input hero__form-input  form-control custom-select">
                                                                <option value="">Select</option>
                                                                <option value="0"
                                                                    {{ $property->moderation_status == '0' ? 'selected' : '' }}>
                                                                    Pending</option>
                                                                <option value="1"
                                                                    {{ $property->moderation_status == '1' ? 'selected' : '' }}>
                                                                    Approved</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endcan
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Property Title</label>
                                                        <input type="text" name="title"
                                                            class="form-control filter-input"
                                                            @if (isset($propertyTranslation->title)) value="{{ $propertyTranslation->title }}" @else value="" @endif
                                                            placeholder="Property Title">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Property Type</label>
                                                    <select name="type"
                                                        class="listing-input hero__form-input  form-control custom-select">
                                                        <option>Select</option>
                                                        <option value="{{ 'sale' }}"
                                                            {{ $property->type == 'sale' ? 'selected' : '' }}>Sale
                                                        </option>
                                                        <option value="{{ 'rent' }}"
                                                            {{ $property->type == 'rent' ? 'selected' : '' }}>Rent
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Suitable for Citizenship?</label>
                                                    <select name="citizenship"
                                                        class="listing-input hero__form-input  form-control custom-select">
                                                        <option>Select</option>
                                                        <option value="{{ '1' }}"
                                                            {{ $property->propertyDetails->citizenship == '1' ? 'selected' : '' }}>
                                                            Yes</option>
                                                        <option value="{{ '2' }}"
                                                            {{ $property->propertyDetails->citizenship == '2' ? 'selected' : '' }}>
                                                            No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Category</label>
                                                    <select name="category_id" id="category_id"
                                                        class="listing-input hero__form-input  form-control custom-select">
                                                        <option>Select</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->category_id }}"
                                                                {{ $property->category_id == $category->category_id ? 'selected' : '' }}>
                                                                {{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Country:</label>
                                                        <select name="country_id"
                                                            class="listing-input hero__form-input  form-control custom-select {{ $errors->has('country_id') ? 'has-error' : '' }}"
                                                            id="country">
                                                            <option value="">Select</option>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country->country_id }}"
                                                                    {{ $property->country_id == $country->country_id ? 'selected' : '' }}>
                                                                    {{ $country->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('country_id'))
                                                            <span class="help-block text-danger">
                                                                <strong> {{ $errors->first('country_id') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>State</label>
                                                        <select name="state_id"
                                                            class="listing-input hero__form-input  form-control custom-select"
                                                            id="state">
                                                            <option value="">Select</option>
                                                            @foreach ($states as $state)
                                                                <option value="{{ $state->state_id }}"
                                                                    {{ $property->state_id == $state->state_id ? 'selected' : '' }}>
                                                                    {{ $state->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <select name="city_id"
                                                            class="listing-input hero__form-input  form-control custom-select"
                                                            id="city">
                                                            <option value="">Select</option>
                                                            @foreach ($cities as $city)
                                                                <option value="{{ $city->city_id }}"
                                                                    {{ $property->city_id == $city->city_id ? 'selected' : '' }}>
                                                                    {{ $city->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Listing Size</label>
                                                        <input type="text" name="room_size"
                                                            class="form-control filter-input"
                                                            value="{{ isset($property->propertyDetails->room_size) ? $property->propertyDetails->room_size : '' }}"
                                                            placeholder="144">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Property ID</label>
                                                    <input type="text" name="property_id"
                                                        class="form-control filter-input"
                                                        value="{{ $property->property_id }}" placeholder="ZOAC25">
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tag:</label> <span class="text-danger">*</span>
                                                        <select name="tag[]" id="" class="form-control"
                                                            multiple>
                                                            <option value="">Select</option>
                                                            @foreach ($tags as $tag)
                                                                <option value="{{ $tag->id }}"
                                                                    @foreach ($propertyTags as $t)
                                                                        @if ($tag->id == $t->id)
                                                                            selected
                                                                        @endif @endforeach>
                                                                    {{ $tag->tagTranslation->name ?? ($tag->tagTranslationEnglish->name ?? null) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('tag')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Property Price</label>
                                                        <input type="text" name="price"
                                                            class="form-control filter-input"
                                                            value="{{ $property->price }}" placeholder="$1500">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Currency</label>
                                                        <select name="currency_id"
                                                            class="listing-input hero__form-input  form-control custom-select">
                                                            {{-- <option value="">Select</option> --}}
                                                            @foreach ($currencies as $currency)
                                                                <option value="{{ $currency->id }}"
                                                                    {{ $property->currency_id == $currency->id ? 'selected' : '' }}>
                                                                    {{ $currency->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Is Featured</label>
                                                        <input type="checkbox" name="is_featured"
                                                            data-toggle="toggle" data-on="featured"
                                                            data-off="not featured" data-onstyle="success"
                                                            data-offstyle="danger"
                                                            {{ $property->is_featured == 1 ? 'checked' : '' }}>
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
                                Links
                                <button type="button" class="btn btn-outline-dark float-right" data-toggle="collapse"
                                    data-target="#collapse2" aria-expanded="true"
                                    aria-controls="collapse2"></button>
                            </div>
                            <div id="collapse2" class="collapse" aria-labelledby="heading2"
                                data-parent="#accordion2">
                                <div class="card-body">

                                    <div class="db-add-list-wrap">
                                        <div class="db-add-listing">
                                            <div class="row">

                                                <div class="col-md-12 mt-30">
                                                    <div class="form-group">
                                                        <label>Property Video Link</label>
                                                        <input type="text" name="video" class="form-control filter-input"
                                                            value="{{ isset($property->propertyDetails->video) ? $property->propertyDetails->video : '' }}"
                                                            placeholder="Video Link Here">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-30">
                                                    <div class="form-group">
                                                        <label>Drive Link</label>
                                                        <input type="text" name="drive_link" class="form-control filter-input"
                                                            value="{{ isset($property->propertyDetails->drive_link) ? $property->propertyDetails->drive_link : '' }}"
                                                            placeholder="Google Drive Link">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-30">
                                                    <div class="form-group">
                                                        <label>Drive-GGI</label>
                                                        <input type="text" name="plans_link" class="form-control filter-input"
                                                            value="{{ isset($property->propertyDetails->plans_link) ? $property->propertyDetails->plans_link : '' }}"
                                                            placeholder="Plans Link">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-30">
                                                    <div class="form-group">
                                                        <label>Word Link</label>
                                                        <input type="text" name="word_link" class="form-control filter-input"
                                                            value="{{ isset($property->propertyDetails->word_link) ? $property->propertyDetails->word_link : '' }}"
                                                            placeholder="Word Link">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-30">
                                                    <div class="form-group">
                                                        <label>Prices Link</label>
                                                        <input type="text" name="prices_link" class="form-control filter-input"
                                                            value="{{ isset($property->propertyDetails->prices_link) ? $property->propertyDetails->prices_link : '' }}"
                                                            placeholder="Prices Drive Link">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-30">
                                                    <div class="form-group">
                                                        <label>Whatsapp Link</label>
                                                        <input type="text" name="whatsapp_link" class="form-control filter-input"
                                                            value="{{ isset($property->propertyDetails->whatsapp_link) ? $property->propertyDetails->whatsapp_link : '' }}"
                                                            placeholder="Whatsapp Link">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-30">
                                                    <div class="form-group">
                                                        <label>Presentation Link</label>
                                                        <input type="text" name="presentation" class="form-control filter-input"
                                                            value="{{ isset($property->propertyDetails->presentation) ? $property->propertyDetails->presentation : '' }}"
                                                            placeholder="Presentation Link Here">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-30">
                                                    <div class="form-group">
                                                        <label>IVR Link</label>
                                                        <input type="text" name="ivr" class="form-control filter-input"
                                                            value="{{ isset($property->propertyDetails->ivr) ? $property->propertyDetails->ivr : '' }}"
                                                            placeholder="IVR Link">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    {{-- <form> --}}
                                                        <div class="form-group">
                                                            <label for="list_info">Description</label>
                                                            <textarea name="description" class="form-control" id="list_info" rows="4" placeholder="Enter your text here">
                                                                @if (isset($propertyTranslation->description))
                                                                {{ $propertyTranslation->description }}
                                                                @endif
                                                            </textarea>
                                                        </div>
                                                    {{-- </form> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="content">Content</label>
                                                        <textarea name="content" class="form-control" id="content" rows="4" placeholder="Enter your text here">{{ $property->propertyDetails->propertyDetailTranslation->content ?? ($property->propertyDetails->propertyDetailTranslationEnglish->content ?? null) }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="location">Location</label>
                                                        <textarea name="location_info" class="form-control" id="location_info" rows="4"
                                                            placeholder="Enter your text here">{{ $property->propertyDetails->propertyDetailTranslation->location_info ?? ($property->propertyDetails->propertyDetailTranslationEnglish->location_info ?? null) }}</textarea>
                                                    </div>
                                                </div>
                                                @php
                                                    foreach ($property->facilities as $key => $f) {
                                                        $fac[] = $f->id;
                                                    }

                                                @endphp
                                                <div class="col-md-12 border rounded-2 p-3">
                                                    <div class="form-group">
                                                        <label>Facilities</label>
                                                        <div class="row">
                                                            @foreach ($facilities as $facility)
                                                                <div class="col-4">
                                                                    <input id="{{ $facility->name }}" type="checkbox"
                                                                        name="facility_id[]" value="{{ $facility->facility_id }}"
                                                                        @foreach ($property->facilities as $f)
                                                                        @if ($facility->facility_id == $f->id)
                                                                            checked
                                                                        @endif @endforeach>
                                                                    <label for="{{ $facility->name }}">{{ $facility->name }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mb-4">
                                                    <div class="user-image mb-3 text-center">
                                                        <img loading="lazy"
                                                            src="{{ URL::asset('/images/thumbnail/' . $property->thumbnail) }}"
                                                            alt="" id="preview-image-before-upload"
                                                            style="width: 350px;height: 254px;">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Thumbnail Image</label> <span class="text-danger">*</span>
                                                        <input type="file" name="thumbnail" class="form-control" id="photo-upload"
                                                            value="{{ $property->thumbnail }}">
                                                        @error('thumbnail')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mb-5">
                                                    <div class="act-title">
                                                        <h5>Gallery :</h5>
                                                    </div>
                                                    @php
                                                        $pic = json_decode($property->image->name);
                                                    @endphp
                                                    {{-- <div class="user-image mb-3 text-center"> --}}
                                                    {{-- <div class="imgPreview"> --}}
                                                    {{-- @foreach ($pic as $key => $p) --}}
                                                    {{-- <img loading="lazy" class="" src="{{ URL::asset('images/gallery/'.$p)}}" alt="slide"> --}}
                                                    {{-- @endforeach --}}
                                                    {{-- </div> --}}
                                                    {{-- </div> --}}
                                                    @if ($pic)
                                                        <div class="col-md-12">
                                                            <div class="mt-1 text-center">
                                                                <div class="images-preview-div">
                                                                    @foreach ($pic as $key => $p)
                                                                        <input type="hidden" name="oldImages[]"
                                                                            value="{{ $p }}" multiple>
                                                                        <div class="d-flex" id="{{ $key }}">
                                                                            <img class="1" loading="lazy"
                                                                                src="{{ URL::asset('images/gallery/' . $p) }}"
                                                                                alt="slide">
                                                                            <span><i class="las la-trash old-image 1"
                                                                                    data-id="{{ $p }}"
                                                                                    data-property={{ $property->id }}
                                                                                    style="padding-top: 25px;pointer:cursor"></i></span>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <button type="button" data-property={{ $property->id }}
                                                                class="btn btn-danger delete-images m-3">Delete all images <i
                                                                    class="las la-trash"></i></button>
                                                        </div>
                                                    @endif
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <div class="add-listing__input-file-box">
                                                                <input class="add-listing__input-file" type="file" name="images[]"
                                                                    multiple="multiple" id="images">
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

                    <div id="accordion3" class="pt-3">
                        <div class="card">
                            <div class="card-header" id="heading3">
                                Project Details
                                <button type="button" class="btn btn-outline-dark float-right" data-toggle="collapse"
                                    data-target="#collapse3" aria-expanded="true"
                                    aria-controls="collapse3"></button>
                            </div>
                            <div id="collapse3" class="collapse" aria-labelledby="heading3"
                                data-parent="#accordion3">
                                <div class="card-body">

                                    @if ($property->category_id == '5' || $property->category_id == '4')
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
                                                                value="{{ isset($property->propertyDetails->blocks) ? $property->propertyDetails->blocks : '' }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Delivery Month</label>
                                                            <input type="number" name="delivery_month" class="form-control filter-input"
                                                                value="{{ isset($property->propertyDetails->delivery_month) ? $property->propertyDetails->delivery_month : '' }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Delivery Years</label>
                                                            <input type="number" name="deliver_year" class="form-control filter-input"
                                                                value="{{ isset($property->propertyDetails->deliver_year) ? $property->propertyDetails->deliver_year : '' }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Units Count</label>
                                                        <input type="number" name="total_units" class="form-control filter-input"
                                                            value="{{ isset($property->propertyDetails->total_units) ? $property->propertyDetails->total_units : '' }}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Units Per Floor</label>
                                                            <input type="number" name="units_infloors" class="form-control filter-input"
                                                                value="{{ isset($property->propertyDetails->units_infloors) ? $property->propertyDetails->units_infloors : '' }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Available Floors</label>
                                                            <input type="number" name="available_floors"
                                                                class="form-control filter-input"
                                                                value="{{ isset($property->propertyDetails->available_floors) ? $property->propertyDetails->available_floors : '' }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Building Age</label>
                                                            <input type="number" name="building_age" class="form-control filter-input"
                                                                value="{{ isset($property->propertyDetails->building_age) ? $property->propertyDetails->building_age : '' }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>View</label>
                                                            <select name="view"
                                                                class="listing-input hero__form-input  form-control custom-select">
                                                                <option value="">Select Option</option>
                                                                <option value="1"
                                                                    @if (isset($property->propertyDetails->view)) {{ $property->propertyDetails->view == '1' ? 'selected' : '' }} @endif>
                                                                    {{ trans('file.na') }}</option>
                                                                <option value="{{ '2' }}"
                                                                    @if (isset($property->propertyDetails->view)) {{ $property->propertyDetails->view == '2' ? 'selected' : '' }} @endif>
                                                                    {{ trans('file.view_sea') }}</option>
                                                                <option value="{{ '3' }}"
                                                                    @if (isset($property->propertyDetails->view)) {{ $property->propertyDetails->view == '3' ? 'selected' : '' }} @endif>
                                                                    {{ trans('file.view_forest') }}</option>
                                                                <option value="{{ '4' }}"
                                                                    @if (isset($property->propertyDetails->view)) {{ $property->propertyDetails->view == '4' ? 'selected' : '' }} @endif>
                                                                    {{ trans('file.view_street') }}</option>
                                                                <option value="{{ '5' }}"
                                                                    @if (isset($property->propertyDetails->view)) {{ $property->propertyDetails->view == '5' ? 'selected' : '' }} @endif>
                                                                    {{ trans('file.view_landscape') }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Maintenance Fees</label>
                                                            <input type="number" name="maintenance_fee"
                                                                class="form-control filter-input"
                                                                value="{{ isset($property->propertyDetails->maintenance_fee) ? $property->propertyDetails->maintenance_fee : '' }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Social Facilities Size</label>
                                                            <input type="number" name="landscape" class="form-control filter-input"
                                                                value="{{ isset($property->propertyDetails->landscape) ? $property->propertyDetails->landscape : '' }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Heating System</label>
                                                        <select name="heating"
                                                            class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1"
                                                                @if (isset($property->propertyDetails->heating)) {{ $property->propertyDetails->heating == '1' ? 'selected' : '' }} @endif>
                                                                {{ trans('file.na') }}</option>
                                                            <option value="2"
                                                                @if (isset($property->propertyDetails->heating)) {{ $property->propertyDetails->heating == '2' ? 'selected' : '' }} @endif>
                                                                {{ trans('file.central_heating') }}</option>
                                                            <option value="3"
                                                                @if (isset($property->propertyDetails->heating)) {{ $property->propertyDetails->heating == '3' ? 'selected' : '' }} @endif>
                                                                {{ trans('file.natural_gas') }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Title Deed Type</label>
                                                        <select name="title_deed_type"
                                                            class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1"
                                                                @if (isset($property->propertyDetails->title_deed_type)) {{ $property->propertyDetails->title_deed_type == '1' ? 'selected' : '' }} @endif>
                                                                Ready</option>
                                                            <option value="2"
                                                                @if (isset($property->propertyDetails->title_deed_type)) {{ $property->propertyDetails->title_deed_type == '2' ? 'selected' : '' }} @endif>
                                                                Under Construction</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Cash Option</label>
                                                        <select name="cash"
                                                            class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1"
                                                                @if (isset($property->propertyDetails->cash)) {{ $property->propertyDetails->cash == '1' ? 'selected' : '' }} @endif>
                                                                {{ trans('file.No') }}</option>
                                                            <option value="2"
                                                                @if (isset($property->propertyDetails->cash)) {{ $property->propertyDetails->cash == '2' ? 'selected' : '' }} @endif>
                                                                {{ trans('file.Yes') }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Installment Option</label>
                                                        <select name="installments"
                                                            class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1"
                                                                @if (isset($property->propertyDetails->installments)) {{ $property->propertyDetails->installments == '1' ? 'selected' : '' }} @endif>
                                                                {{ trans('file.No') }}</option>
                                                            <option value="2"
                                                                @if (isset($property->propertyDetails->installments)) {{ $property->propertyDetails->installments == '2' ? 'selected' : '' }} @endif>
                                                                {{ trans('file.Yes') }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Mortgage</label>
                                                        <select name="creditability"
                                                            class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1"
                                                                @if (isset($property->propertyDetails->creditability)) {{ $property->propertyDetails->creditability == '1' ? 'selected' : '' }} @endif>
                                                                {{ trans('file.No') }}</option>
                                                            <option value="2"
                                                                @if (isset($property->propertyDetails->creditability)) {{ $property->propertyDetails->creditability == '2' ? 'selected' : '' }} @endif>
                                                                {{ trans('file.Yes') }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Exchangable</label>
                                                        <select name="convertability"
                                                            class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="No"
                                                                @if (isset($property->propertyDetails->convertability)) {{ $property->propertyDetails->convertability == 'No' ? 'selected' : '' }} @endif>
                                                                No</option>
                                                            <option value="Yes"
                                                                @if (isset($property->propertyDetails->convertability)) {{ $property->propertyDetails->convertability == 'Yes' ? 'selected' : '' }} @endif>
                                                                Yes</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Units Type</label>
                                                            <select class="listing-input hero__form-input  form-control custom-select"
                                                                name="bed[]" multiple="">
                                                                <option value="">Select Option</option>
                                                                <option value="1">0+1</option>
                                                                <option value="2">1+1</option>
                                                                <option value="3">1+2</option>
                                                                <option value="4">1+3</option>
                                                                <option value="5">1+4</option>
                                                                <option value="6">1+5</option>
                                                                <option value="7">1+6</option>
                                                                <option value="8">1+7</option>
                                                                <option value="9">1+8</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($property->category_id == '1' && $property->category_id == '4')
                                        <div class="db-add-list-wrap" id="property">
                                            <div class="act-title">
                                                <h5>Property Details :</h5>
                                            </div>
                                            <div class="db-add-listing">
                                                <div class="row mb-30">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Number of Bath</label>
                                                            <input type="number" name="bath" id="bath"
                                                                class="form-control filter-input"
                                                                value="{{ isset($property->propertyDetails->bath) ? $property->propertyDetails->bath : '' }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Number of Garages</label>
                                                            <input type="number" name="garage" class="form-control filter-input"
                                                                value="{{ isset($property->propertyDetails->garage) ? $property->propertyDetails->garage : '' }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Select Floor</label>
                                                            <input type="number" name="floor" class="form-control filter-input"
                                                                value="{{ isset($property->propertyDetails->floor) ? $property->propertyDetails->floor : '' }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Inside Project</label>
                                                        <select name="inside_project"
                                                            class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1"
                                                                {{ $property->inside_project == '1' ? 'selected' : '' }}>No</option>
                                                            <option value="2"
                                                                {{ $property->inside_project == '2' ? 'selected' : '' }}>Yes</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($property->category_id == '3')
                                        <div class="db-add-list-wrap" id="land">
                                            <div class="act-title">
                                                <h5>Land Details:</h5>
                                            </div>
                                            <div class="db-add-listing">
                                                <div class="row mb-30">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Island No</label>
                                                            <input type="number" name="island_no" class="form-control filter-input"
                                                                value="{{ isset($property->propertyDetails->island_no) ? $property->propertyDetails->island_no : '' }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Sheet No</label>
                                                            <input type="number" name="sheet_no" class="form-control filter-input"
                                                                value="{{ isset($property->propertyDetails->sheet_no) ? $property->propertyDetails->sheet_no : '' }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Precedent Value</label>
                                                            <input type="number" name="precedent_value"
                                                                class="form-control filter-input"
                                                                value="{{ isset($property->propertyDetails->precedent_value) ? $property->propertyDetails->precedent_value : '' }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Gauge</label>
                                                            <input type="number" name="gauge" class="form-control filter-input"
                                                                value="{{ isset($property->propertyDetails->gauge) ? $property->propertyDetails->gauge : '' }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Parcel Number</label>
                                                            <input type="number" name="parcel" class="form-control filter-input"
                                                                value="{{ isset($property->propertyDetails->parcel) ? $property->propertyDetails->parcel : '' }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Heating System</label>
                                                        <select name="heating"
                                                            class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1"
                                                                @if (isset($property->propertyDetails->heating)) {{ $property->propertyDetails->heating == '1' ? 'selected' : '' }} @endif>
                                                                {{ trans('file.na') }}</option>
                                                            <option value="2"
                                                                @if (isset($property->propertyDetails->heating)) {{ $property->propertyDetails->heating == '2' ? 'selected' : '' }} @endif>
                                                                {{ trans('file.central_heating') }}</option>
                                                            <option value="3"
                                                                @if (isset($property->propertyDetails->heating)) {{ $property->propertyDetails->heating == '3' ? 'selected' : '' }} @endif>
                                                                {{ trans('file.natural_gas') }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Title Deed Type</label>
                                                        <select name="title_deed_type"
                                                            class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1"
                                                                @if (isset($property->propertyDetails->title_deed_type)) {{ $property->propertyDetails->title_deed_type == '1' ? 'selected' : '' }} @endif>
                                                                {{ trans('file.condominium') }}</option>
                                                            <option value="2"
                                                                @if (isset($property->propertyDetails->title_deed_type)) {{ $property->propertyDetails->title_deed_type == '2' ? 'selected' : '' }} @endif>
                                                                {{ trans('file.easement') }}</option>
                                                            <option value="3"
                                                                @if (isset($property->propertyDetails->title_deed_type)) {{ $property->propertyDetails->title_deed_type == '3' ? 'selected' : '' }} @endif>
                                                                {{ trans('file.shared') }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Mortgage</label>
                                                        <select name="creditability"
                                                            class="listing-input hero__form-input  form-control custom-select">
                                                            <option value="">Select Option</option>
                                                            <option value="1"
                                                                @if (isset($property->propertyDetails->creditability)) {{ $property->propertyDetails->creditability == '1' ? 'selected' : '' }} @endif>
                                                                {{ trans('file.No') }}</option>
                                                            <option value="2"
                                                                @if (isset($property->propertyDetails->creditability)) {{ $property->propertyDetails->creditability == '2' ? 'selected' : '' }} @endif>
                                                                {{ trans('file.Yes') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

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

                                    <div id="dynamicAddRemove">
                                        @for ($i = 0 ; $i< count($property->propertyDetails->floors); $i++)
                                            <div>
                                                <table class="table table-bordered" id="">
                                                    <input name="addMoreInputFields[{{$i}}][property_details_id]" value="{{$property->propertyDetails->id}}" hidden />
                                                    <input name="addMoreInputFields[{{$i}}][unit_id]" value="{{$property->propertyDetails->floors[$i]->unit_id}}" hidden />
                                                    <input name="addMoreInputFields[{{$i}}][id]" value="{{$property->propertyDetails->floors[$i]->id}}" hidden />
                                                    <tr>
                                                        <td>
                                                            <label for="addMoreInputFields[{{$i}}][min_price]">min price</label>
                                                            <input type="number" id="addMoreInputFields[{{$i}}][min_price]" name="addMoreInputFields[{{$i}}][min_price]" value="{{$property->propertyDetails->floors[$i]->min_price}}" class="form-control" min="0" required />
                                                        </td>
                                                        <td>
                                                            <label for="addMoreInputFields[{{$i}}][max_price]">max price</label>
                                                            <input type="number" id="addMoreInputFields[{{$i}}][max_price]" name="addMoreInputFields[{{$i}}][max_price]" value="{{$property->propertyDetails->floors[$i]->max_price}}" class="form-control" min="0" required />
                                                        </td>
                                                        <td>
                                                            <label for="addMoreInputFields[{{$i}}][min_size]">min size</label>
                                                            <input type="number" id="addMoreInputFields[{{$i}}][min_size]" name="addMoreInputFields[{{$i}}][min_size]" value="{{$property->propertyDetails->floors[$i]->min_size}}" class="form-control" min="0" required />
                                                        </td>
                                                        <td>
                                                            <label for="addMoreInputFields[{{$i}}][max_size]">max size</label>
                                                            <input type="number" id="addMoreInputFields[{{$i}}][max_size]" name="addMoreInputFields[{{$i}}][max_size]" value="{{$property->propertyDetails->floors[$i]->max_size}}" class="form-control" min="0" required />
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <label for="addMoreInputFields[{{$i}}][unit_id]">rooms</label>
                                                            <select id="addMoreInputFields[{{$i}}][unit_id]" name="addMoreInputFields[{{$i}}][unit_id]"
                                                                        class="listing-input hero__form-input  form-control custom-select">
                                                                        <option value="" disabled>Select</option>
                                                                        @foreach ($units as $unit)
                                                                            <option value="{{ $unit->id }}"
                                                                                {{ $property->propertyDetails->floors[$i]->unit_id == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                                                                        @endforeach
                                                            </select>
                                                            {{-- <input type="text" id="addMoreInputFields[0][unit_id]" name="addMoreInputFields[0][unit_id]" class="form-control" /></td> --}}
                                                        <td>
                                                            <label for="addMoreInputFields[{{$i}}][baths]">baths</label>
                                                            <input type="number" id="addMoreInputFields[{{$i}}][baths]" name="addMoreInputFields[{{$i}}][baths]" value="{{$property->propertyDetails->floors[$i]->baths}}" class="form-control" min="1" required /></td>
                                                        <td>
                                                            <label for="addMoreInputFields[{{$i}}][is_sold]">Is Sold</label>
                                                            <select id="addMoreInputFields[{{$i}}][is_sold]" name="addMoreInputFields[{{$i}}][is_sold]" class="listing-input hero__form-input  form-control custom-select">
                                                                <option value="0" {{ $property->propertyDetails->floors[$i]->is_sold == 0 ? 'selected' : '' }}>No</option>
                                                                <option value="1" {{ $property->propertyDetails->floors[$i]->is_sold == 1 ? 'selected' : '' }}>Yes</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <label for="addMoreInputFields[{{$i}}][ivr_link]">ivr link</label>
                                                            <input type="text" id="addMoreInputFields[{{$i}}][ivr_link]" name="addMoreInputFields[{{$i}}][ivr_link]" value="{{$property->propertyDetails->floors[$i]->ivr_link}}" class="form-control" />
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <label for="addMoreInputFields[{{$i}}][note_ar]">Note Arabic</label>
                                                            <input type="text" id="addMoreInputFields[{{$i}}][note_ar]" name="addMoreInputFields[{{$i}}][note_ar]" value="{{$property->propertyDetails->floors[$i]->note_ar}}" class="form-control" />
                                                        </td>
                                                        <td>
                                                            <label for="addMoreInputFields[{{$i}}][note_en]">Note English</label>
                                                            <input type="text" id="addMoreInputFields[{{$i}}][note_en]" name="addMoreInputFields[{{$i}}][note_en]" value="{{$property->propertyDetails->floors[$i]->note_en}}" class="form-control" />
                                                        </td>
                                                        <td colspan="2">
                                                            <label for="addMoreInputFields[{{$i}}][image]">Image</label>
                                                            <input type="file" id="addMoreInputFields[{{$i}}][image]" name="addMoreInputFields[{{$i}}][image]" class="form-control" />
                                                        </td>
                                                    </tr>

                                                </table>
                                                <div class="user-image mb-3 text-center">
                                                    <img loading="lazy"
                                                        src="{{ URL::asset('/images/floors/' . $property->propertyDetails->floors[$i]->image) }}"
                                                        alt="" id="preview-image-before-upload" style="max-height:300px">
                                                </div>
                                                @if($i == 0)
                                                    <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary mb-3">Add unit</button>
                                                @else
                                                    <button id="delete-btn" type="button" class="btn btn-outline-danger remove-input-field">Delete</button>
                                                @endif
                                            </div>
                                        @endfor
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
            selector: '#content',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount code',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat | code ',
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
            if (propertyType == 1) {
                $("#bed").show();
                $("#bath").show();
            } else {
                $("#bed").hide();
                $("#bath").hide();
            }
        });
    </script>
    <script>
        (function($) {
            "use strict";
            // Multiple images preview with JavaScript

            $('#photo-upload').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

            $('.old-image').click(function() {

                var image = $(this).attr("data-id");
                var id = $(this).attr("data-property");
                // alert(key);
                $.ajax({
                    url: "{{ route('admin.destroy.galleryImage') }}",
                    method: "GET",
                    data: {
                        id: id,
                        image: image
                    },
                    success: function(data) {
                        // alert(data);
                        alert(data);
                        location.reload();
                        // if (data =='success') {
                        //     window.location.href = "English";
                        // }
                    }
                })
                $(this).parent().parent().remove();

            });

            // delete all images
            $('.delete-images').click(function() {

                // var image = $(this).attr("data-id");
                var id = $(this).attr("data-property");
                // alert(key);
                $.ajax({
                    url: "{{ route('admin.destroy.allGalleryImages') }}",
                    method: "GET",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        // alert(data);
                        alert(data);
                        location.reload();
                        // if (data =='success') {
                        //     window.location.href = "English";
                        // }
                    }
                })
                $(this).parent().parent().remove();

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
    </script>

<script type="text/javascript">
    var i = $('#delete-btn').length;
    console.log(i);
    $("#dynamic-ar").click(function () {
        ++i;

        var html = `
        <div class="pt-3">
        <table class="table table-bordered" id="dynamicAddRemove">

            <tr>
                <td>
                    <label for="addMoreInputFields[`+ i +`][min_price]">min price</label>
                    <input type="number" id="addMoreInputFields[`+ i +`][min_price]" name="addMoreInputFields[`+ i +`][min_price]" class="form-control" value="0" min="0" required />
                </td>
                <td>
                    <label for="addMoreInputFields[`+ i +`][max_price]">max price</label>
                    <input type="text" id="addMoreInputFields[`+ i +`][max_price]" name="addMoreInputFields[`+ i +`][max_price]" class="form-control" value="0" min="0" required />
                </td>
                <td>
                    <label for="addMoreInputFields[`+ i +`][min_size]">min size</label>
                    <input type="text" id="addMoreInputFields[`+ i +`][min_size]" name="addMoreInputFields[`+ i +`][min_size]" class="form-control" value="0" min="0" required />
                </td>
                <td>
                    <label for="addMoreInputFields[`+ i +`][max_size]">max size</label>
                    <input type="text" id="addMoreInputFields[`+ i +`][max_size]" name="addMoreInputFields[`+ i +`][max_size]" class="form-control" value="0" min="0" required />
                </td>
            </tr>

            <tr>
                <td>
                    <label for="addMoreInputFields[`+ i +`][unit_id]">rooms</label>
                    <select id="addMoreInputFields[`+ i +`][unit_id]" name="addMoreInputFields[`+ i +`][unit_id]"
                                                                class="listing-input hero__form-input  form-control custom-select">
                                                                `+ $options +`
                    </select>

                </td>
                <td>
                    <label for="addMoreInputFields[`+ i +`][baths]">baths</label>
                    <input type="text" id="addMoreInputFields[`+ i +`][baths]" name="addMoreInputFields[`+ i +`][baths]" class="form-control" value="1" min="1" required /></td>
                <td>
                    <label for="addMoreInputFields[`+ i +`][is_sold]">Is Sold</label>
                    <select id="addMoreInputFields[`+ i +`][is_sold]" name="addMoreInputFields[`+ i +`][is_sold]" class="listing-input hero__form-input  form-control custom-select">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </td>
                <td>
                    <label for="addMoreInputFields[`+ i +`][ivr_link]">ivr link</label>
                    <input type="text" id="addMoreInputFields[`+ i +`][ivr_link]" name="addMoreInputFields[`+ i +`][ivr_link]" class="form-control" />
                </td>
            </tr>

            <tr>
                <td>
                    <label for="addMoreInputFields[`+ i +`][note_ar]">Note Arabic</label>
                    <input type="text" id="addMoreInputFields[`+ i +`][note_ar]" name="addMoreInputFields[`+ i +`][note_ar]" class="form-control" />
                </td>
                <td>
                    <label for="addMoreInputFields[`+ i +`][note_en]">Note English</label>
                    <input type="text" id="addMoreInputFields[`+ i +`][note_en]" name="addMoreInputFields[`+ i +`][note_en]" class="form-control" />
                </td>
                <td colspan="2">
                    <label for="addMoreInputFields[`+ i +`][image]">Image</label>
                    <input type="file" id="addMoreInputFields[`+ i +`][image]" name="addMoreInputFields[`+ i +`][image]" class="form-control" />
                </td>
            </tr>

        </table>
        <button type="button" class="btn btn-outline-danger remove-input-field">Delete</button>
        </div>
        `;

        $("#dynamicAddRemove").append(html);

        var $options = $("#addMoreInputFields\\[0\\]\\[unit_id\\] > option").clone();
        $('#addMoreInputFields\\['+ i +'\\]\\[unit_id\\]').append($options);

    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parent('div').remove();
    });
</script>

@endpush
