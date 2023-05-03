@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Edit Testimonial :</h5>
                        </div>


                        <div class="db-add-listing">
                            <form action="{{route('admin.testimonials.update',$testimonial->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="local" value="{{$locale}}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Title:</label><span class="text-danger">*</span>
                                            <input type="text" name="name" class="form-control filter-input {{ $errors->has('name') ? 'has-error' : '' }}" placeholder="Title" value="{{$testimonialTranslation->name}}">
                                            @if($errors->has('name'))
                                                <span class="help-block text-danger">
                                                <strong> {{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>VR Link </label>
                                            <input type="text" name="address" class="form-control filter-input" placeholder="VR Link" value="{{$testimonialTranslation->address}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <div class="user-image mb-3 text-center">
                                            <img loading="lazy" src="{{ URL::asset('/images/images/'.$testimonial->file)  }}" alt="" id="preview-image-before-upload">
                                        </div>

                                        <div class="form-group">
                                            <label for="">File:(image/testimonial)</label> <span class="text-danger">*</span>
                                            <input type="file" name="file" class="form-control" id="photo-upload" value="{{$testimonial->file}}">
                                            @error('file')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="list_info">Description</label> <span class="text-danger">*</span>
                                            <textarea name="description" class="form-control" id="list_info" rows="4" placeholder="Enter your text here">{{$testimonial->description}}</textarea>
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
                                            <input type="number" name="order" class="form-control filter-input" placeholder="Order" value="{{$testimonial->order}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Status</label>
                                        <select name="status" class="listing-input hero__form-input  form-control custom-select {{ $errors->has('status') ? 'has-error' : '' }}">
                                            <option value="">Select</option>
                                            <option value="1" {{$testimonial->status == 1 ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{$testimonial->status == 0 ? 'selected' : ''}}>Inactive</option>
                                        </select>
                                        @if($errors->has('status'))
                                            <span class="help-block text-danger">
                                            <strong> {{ $errors->first('status') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Details Link </label>
                                                <input type="text" name="link" class="form-control filter-input"
                                                    placeholder="Link" value="{{$testimonial->link}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-5">
                                        <div class="add-btn">
                                            <button class="btn v3">SAVE</button>
                                            <a href="{{route('admin.testimonials.index')}}" class="btn v2">Back</a>
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
