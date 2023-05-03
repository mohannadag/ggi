@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Story :</h5>
                        </div>


                        <div class="db-add-listing">
                            <form action="{{route('admin.stories.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title:</label><span class="text-danger">*</span>
                                        <input type="text" name="title" class="form-control filter-input {{ $errors->has('title') ? 'has-error' : '' }}" placeholder="Title">
                                        @if($errors->has('title'))
                                            <span class="help-block text-danger">
                                            <strong> {{ $errors->first('title') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Campaign </label>
                                        <select name="campaign_id" class="listing-input hero__form-input  form-control custom-select {{ $errors->has('campaign') ? 'has-error' : '' }}">
                                            @foreach ($campaigns as $campaign)
                                            <option value="{{ $campaign->campaign_id }}" {{ old('campaign_id') == $campaign->campaign_id ? 'selected' : '' }}> {{ $campaign->name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Type </label>
                                        <select name="type" class="listing-input hero__form-input  form-control custom-select {{ $errors->has('type') ? 'has-error' : '' }}">
                                            <option value="">Select Type</option>
                                            <option value="photo">Photo</option>
                                            <option value="video">Video</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Duration:</label><span class="text-danger">*</span>
                                        <input type="number" name="duration" class="form-control filter-input {{ $errors->has('duration') ? 'has-error' : '' }}" placeholder="Duration in seconds">
                                        @if($errors->has('title'))
                                            <span class="help-block text-danger">
                                            <strong> {{ $errors->first('duration') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div class="user-image mb-3 text-center">
                                        <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                    </div>

                                    <div class="form-group">
                                        <label for="">File:(image/video)</label> <span class="text-danger">*</span>
                                        <input type="file" name="file" class="form-control" id="photo-upload">
                                        @error('file')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div class="user-image mb-3 text-center">
                                        <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                    </div>

                                    <div class="form-group">
                                        <label for="">File:(image/video)</label> <span class="text-danger">*</span>
                                        <input type="file" name="file_thumb" class="form-control" id="photo-upload">
                                        @error('file_thumb')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Status</label>
                                    <select name="status" class="listing-input hero__form-input  form-control custom-select {{ $errors->has('status') ? 'has-error' : '' }}">
                                        <option value="">Select</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="help-block text-danger">
                                            <strong> {{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Link Title</label>
                                        <input type="text" name="link_title" class="form-control filter-input" placeholder="Link Title" value="{{ old('link_title') }}">
                                    </div>
                                </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Link </label>
                                            <input type="text" name="link" class="form-control filter-input" placeholder="Link" value="{{ old('link') }}">
                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-5">
                                    <div class="add-btn">
                                        <button class="btn v3">SAVE</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
