@extends('admin.main')
@push('styles')
<style>
    .imgPreview img {
        padding: 8px;
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
            <form action="{{route('admin.citizenship.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="citizenship_id" value="1">
                <div class="col-md-12">

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Citizenship :</h5>
                        </div>
                        <div class="db-add-listing">
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Page Title</label> <span class="text-danger">*</span>
                                        <input type="text" name="title" class="form-control filter-input" value="{{$citizenship->citizenshipTranslation->title}}" placeholder="Page Title">
                                        @error('title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Banner Text</label> <span class="text-danger">*</span>
                                        <textarea name="banner_text" class="form-control filter-input" value="{{$citizenship->citizenshipTranslation->banner_text}}" placeholder="Banner Text"> </textarea>
                                        @error('title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Main Button Text</label> <span class="text-danger">*</span>
                                        <input type="text" name="title" class="form-control filter-input" value="{{$citizenship->citizenshipTranslation->main_button_text}}" placeholder="Page Title">
                                        @error('title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Main Button Link</label> <span class="text-danger">*</span>
                                        <textarea name="banner_text" class="form-control filter-input" value="{{$citizenship->citizenshipTranslation->main_button_link}}" placeholder="Banner Text"> </textarea>
                                        @error('title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Extra Button Text</label> <span class="text-danger">*</span>
                                        <input type="text" name="title" class="form-control filter-input" value="{{$citizenship->citizenshipTranslation->extra_button_text}}" placeholder="Page Title">
                                        @error('title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Extra Button Link</label> <span class="text-danger">*</span>
                                        <textarea name="banner_text" class="form-control filter-input" value="{{$citizenship->citizenshipTranslation->extra_button_link}}" placeholder="Banner Text"> </textarea>
                                        @error('title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Overview Title</label> <span class="text-danger">*</span>
                                        <input type="text" name="title" class="form-control filter-input" value="{{$citizenship->citizenshipTranslation->overview_title}}" placeholder="Page Title">
                                        @error('title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Overview Description</label> <span class="text-danger">*</span>
                                        <textarea name="banner_text" class="form-control filter-input" value="{{isset($citizenship->citizenshipTranslation->overview_desc)}}" placeholder="Banner Text"> </textarea>
                                        @error('title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="db-add-list-wrap">
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
<!--CKEditor JS-->
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>


<script>
    (function($) {
        "use strict";
        // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {

            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };

        $('#images').on('change', function() {
            multiImgPreview(this, 'div.imgPreview');
        });


        $('#photo-upload').change(function() {

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#preview-image-before-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });
    })(jQuery);
</script>
@endpush
