@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Edit State :</h5>
                        </div>

                        <div class="db-add-listing">
                            <form action="{{route('admin.states.update',$state->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="local" value="{{$locale}}">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Country:</label> @include('required')
                                            <select name="country_id" class="listing-input hero__form-input  form-control custom-select {{ $errors->has('country_id') ? 'has-error' : '' }}">
                                                <option value="">Select</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->country_id}}" {{$country->country_id == $state->country_id ? 'selected' : ''}}>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('country_id'))
                                                <span class="help-block text-danger">
                                            <strong> {{ $errors->first('country_id') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>State Name:</label> @include('required')
                                            <input type="text" name="name" class="form-control filter-input {{ $errors->has('name') ? 'has-error' : '' }}" placeholder="Country Name" @if(isset($stateTranslation->name)) value="{{$stateTranslation->name}}" @else value="" @endif>
                                            @if($errors->has('name'))
                                                <span class="help-block text-danger">
                                                    <strong> {{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Status</label> @include('required')
                                        <select name="status" class="listing-input hero__form-input  form-control custom-select {{ $errors->has('status') ? 'has-error' : '' }}">
                                            <option value="">Select</option>
                                            <option value="1" {{$state->status == 1 ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{$state->status == 0 ? 'selected' : ''}}>Inactive</option>
                                        </select>
                                        @if($errors->has('status'))
                                            <span class="help-block text-danger">
                                            <strong> {{ $errors->first('status') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" class="form-control" name="image" id="photo-upload">
                                            @error('image')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="user-image mb-3">
                                            <img loading="lazy" src="{{ URL::asset('/images/states/'.$state->image)  }}" alt="" id="preview-image-before-upload">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="list_info">description</label> <span class="text-danger">*</span>
                                            <textarea name="description" class="form-control" id="description" rows="4" placeholder="Enter your text here">{!! old('description') !!}</textarea>
                                            @error('description')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="list_info">Population</label> <span class="text-danger">*</span>
                                            <input type="text" name="Population" class="form-control filter-input {{ $errors->has('Population') ? 'has-error' : '' }}" placeholder="Population" value="">
                                            @error('Population')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-5">
                                        <div class="add-btn">
                                            <button class="btn v3">SAVE</button>
                                            <a href="{{route('admin.countries.index')}}" class="btn v2">Back</a>
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
@push('scripts')
<script src="{{asset('tinymce/tinymce.min.js')}}" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: '#description',
      plugins: 'code table lists',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
  });
  </script>
<script>
    (function($) {
        "use strict";
        $('#images').on('change', function() {
            multiImgPreview(this, 'div.imgPreview');
        });

        $('#photo-upload').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#preview-image-before-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    })(jQuery);
</script>
@endpush
