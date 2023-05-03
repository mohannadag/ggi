@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Videos :</h5>
                        </div>


                        <div class="db-add-listing">
                            <form action="{{route('admin.videos.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Video Title:</label><span class="text-danger">*</span>
                                        <input type="text" name="name" class="form-control filter-input {{ $errors->has('name') ? 'has-error' : '' }}" placeholder="Video Title">
                                        @if($errors->has('name'))
                                            <span class="help-block text-danger">
                                            <strong> {{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Video Link </label>
                                        <input type="text" name="address" class="form-control filter-input" placeholder="Video Link">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div class="user-image mb-3 text-center">
                                        <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Thumbnail:</label> <span class="text-danger">*</span>
                                        <input type="file" name="file" class="form-control" id="photo-upload">
                                        @error('file')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="list_info">Content</label> <span class="text-danger">*</span>
                                        <textarea name="description" class="form-control" id="list_info" rows="4" placeholder="Enter your text here">{{old('description')}}</textarea>
                                        @error('description')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Order </label>
                                            <input type="number" name="order" class="form-control filter-input" placeholder="Order" value="{{ old('order') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Status</label>
                                    <select name="status"
                                        class="listing-input hero__form-input  form-control custom-select {{ $errors->has('status') ? 'has-error' : '' }}">
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
