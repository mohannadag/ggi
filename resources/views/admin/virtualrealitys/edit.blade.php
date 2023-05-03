@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Edit File :</h5>
                        </div>


                        <div class="db-add-listing">
                            <form action="{{route('admin.virtualrealitys.update',$virtualreality->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="local" value="{{$locale}}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Title:</label><span class="text-danger">*</span>
                                            <input type="text" name="name" class="form-control filter-input {{ $errors->has('name') ? 'has-error' : '' }}" placeholder="Title" value="{{$virtualrealityTranslation->name}}">
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
                                            <input type="text" name="address" class="form-control filter-input" placeholder="VR Link" value="{{$virtualrealityTranslation->address}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>VR Link </label>
                                            <input type="text" name="frame_link" class="form-control filter-input" placeholder="Frame Link (optional)" value="{{$virtualreality->frame_link}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <div class="user-image mb-3 text-center">
                                            <img loading="lazy" src="{{ URL::asset('/images/images/'.$virtualreality->file)  }}" alt="" id="preview-image-before-upload">
                                        </div>

                                        <div class="form-group">
                                            <label for="">File:(image/video)</label> <span class="text-danger">*</span>
                                            <input type="file" name="file" class="form-control" id="photo-upload" value="{{$virtualreality->file}}">
                                            @error('file')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="list_info">Description</label> <span class="text-danger">*</span>
                                            <textarea name="description" class="form-control" id="list_info" rows="4" placeholder="Enter your text here">{{$virtualreality->description}}</textarea>
                                            @error('description')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>First Apartment Type </label>
                                        <input type="text" name="first_name" class="form-control filter-input" value="{{$virtualreality->first_name}}">
                                    </div>
                                </div>
                                    <div class="col-md-4">
                                        <label>First Apartment Link </label>
                                        <input type="text" name="first_link" class="form-control filter-input" value="{{$virtualreality->first_link}}">
                                    </div>

                                </div>

                                <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Second Apartment Type </label>
                                        <input type="text" name="second_name" class="form-control filter-input" value="{{$virtualreality->second_name}}">
                                    </div>
                                </div>
                                    <div class="col-md-4">
                                        <label>Second Apartment Link </label>
                                        <input type="text" name="second_link" class="form-control filter-input" value="{{$virtualreality->second_link}}">
                                    </div>

                                </div>
                                <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Third Apartment Type </label>
                                        <input type="text" name="third_name" class="form-control filter-input" value="{{$virtualreality->third_name}}">
                                    </div>
                                </div>
                                    <div class="col-md-4">
                                        <label>Third Apartment Link </label>
                                        <input type="text" name="third_link" class="form-control filter-input" value="{{$virtualreality->third_link}}">
                                    </div>

                            </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Order </label>
                                            <input type="number" name="order" class="form-control filter-input" placeholder="Order" value="{{$virtualreality->order}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Status</label>
                                        <select name="status" class="listing-input hero__form-input  form-control custom-select {{ $errors->has('status') ? 'has-error' : '' }}">
                                            <option value="">Select</option>
                                            <option value="1" {{$virtualreality->status == 1 ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{$virtualreality->status == 0 ? 'selected' : ''}}>Inactive</option>
                                        </select>
                                        @if($errors->has('status'))
                                            <span class="help-block text-danger">
                                            <strong> {{ $errors->first('status') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Details Link </label>
                                                <input type="text" name="link" class="form-control filter-input"
                                                    placeholder="Link" value="{{$virtualreality->link}}">
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-5">
                                        <div class="add-btn">
                                            <button class="btn v3">SAVE</button>
                                            <a href="{{route('admin.virtualrealitys.index')}}" class="btn v2">Back</a>
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

<script>
    (function($) {
        "use strict";

        $('#photo-upload').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#preview-image-before-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    })(jQuery);
</script>
