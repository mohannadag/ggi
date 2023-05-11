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
            <form action="{{route('admin.citizenship.update', $citizenship->citizenship_id)}}" method="POST" enctype="multipart/form-data">
                @csrf
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

                            <div class="col-md-12 mb-4">
                                        <div class="user-image mb-3 text-center">
                                            <img loading="lazy" src="{{ URL::asset('/images/images/'.$citizenship->file)  }}" alt="" id="preview-image-before-upload">
                                        </div>
                                        <div class="form-group">
                                            <label for="">File:(image/page)</label> <span class="text-danger">*</span>
                                            <input type="file" name="file" class="form-control" id="photo-upload" value="{{$citizenship->file}}">
                                            @error('file')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Overview Title</label> <span class="text-danger">*</span>
                                        <input type="text" name="overview_title" class="form-control filter-input" value="{{$citizenship->citizenshipTranslation->overview_title}}" placeholder="Page Title">
                                        @error('overview_title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="list_info">Overview Description</label> <span class="text-danger">*</span>
                                        <textarea name="overview_desc" class="form-control tinymce" id="content" rows="4" placeholder="Enter your text here">{!! $citizenship->citizenshipTranslation->overview_desc ?? $citizenship->citizenshipTranslationEnglish->overview_desc  ?? null !!}</textarea>
                                        @error('overview_desc')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Overview First Title</label> <span class="text-danger">*</span>
                                        <input type="text" name="overview_first_title" class="form-control filter-input" value="{{$citizenship->citizenshipTranslation->overview_first_title}}" placeholder="Page Title">
                                        @error('overview_first_title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="list_info">Overview First Description</label> <span class="text-danger">*</span>
                                        <textarea name="overview_first_desc" class="form-control tinymce" id="content" rows="4" placeholder="Enter your text here">{!! $citizenship->citizenshipTranslation->overview_first_desc ?? $citizenship->citizenshipTranslationEnglish->overview_first_desc  ?? null !!}</textarea>
                                        @error('overview_first_desc')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Overview Second Title</label> <span class="text-danger">*</span>
                                        <input type="text" name="overview_second_title" class="form-control filter-input" value="{{$citizenship->citizenshipTranslation->overview_second_title}}" placeholder="Page Title">
                                        @error('overview_second_title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="list_info">Overview Second Description</label> <span class="text-danger">*</span>
                                        <textarea name="overview_first_desc" class="form-control tinymce" id="content" rows="4" placeholder="Enter your text here">{!! $citizenship->citizenshipTranslation->overview_second_desc ?? $citizenship->citizenshipTranslationEnglish->overview_second_desc  ?? null !!}</textarea>
                                        @error('overview_second_desc')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Overview Third Title</label> <span class="text-danger">*</span>
                                        <input type="text" name="overview_third_title" class="form-control filter-input" value="{{$citizenship->citizenshipTranslation->overview_third_title}}" placeholder="Page Title">
                                        @error('overview_third_title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="list_info">Overview Third Description</label> <span class="text-danger">*</span>
                                        <textarea name="overview_third_desc" class="form-control tinymce" id="content" rows="4" placeholder="Enter your text here">{!! $citizenship->citizenshipTranslation->overview_third_desc ?? $citizenship->citizenshipTranslationEnglish->overview_third_desc  ?? null !!}</textarea>
                                        @error('overview_third_desc')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Field Title</label> <span class="text-danger">*</span>
                                        <input type="text" name="obtaining_title" class="form-control filter-input" value="{{$citizenship->citizenshipTranslation->obtaining_title}}" placeholder="Page Title">
                                        @error('obtaining_title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="list_info">First Field Content</label> <span class="text-danger">*</span>
                                        <textarea name="obtaining_text" class="form-control tinymce" id="content" rows="4" placeholder="Enter your text here">{!! $citizenship->citizenshipTranslation->obtaining_text ?? $citizenship->citizenshipTranslationEnglish->obtaining_text  ?? null !!}</textarea>
                                        @error('obtaining_text')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Second Field Title</label> <span class="text-danger">*</span>
                                        <input type="text" name="acquisition_title" class="form-control filter-input" value="{{$citizenship->citizenshipTranslation->acquisition_title}}" placeholder="Page Title">
                                        @error('acquisition_title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="list_info">Second Field Content</label> <span class="text-danger">*</span>
                                        <textarea name="acquisition_text" class="form-control tinymce" id="content" rows="4" placeholder="Enter your text here">{!! $citizenship->citizenshipTranslation->acquisition_text ?? $citizenship->citizenshipTranslationEnglish->acquisition_text  ?? null !!}</textarea>
                                        @error('acquisition_text')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Third Field Title</label> <span class="text-danger">*</span>
                                        <input type="text" name="documents_title" class="form-control filter-input" value="{{$citizenship->citizenshipTranslation->documents_title}}" placeholder="Page Title">
                                        @error('documents_title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="list_info">Third Field Content</label> <span class="text-danger">*</span>
                                        <textarea name="documents_text" class="form-control tinymce" id="content" rows="4" placeholder="Enter your text here">{!! $citizenship->citizenshipTranslation->documents_text ?? $citizenship->citizenshipTranslationEnglish->documents_text  ?? null !!}</textarea>
                                        @error('documents_text')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fourth Field Title</label> <span class="text-danger">*</span>
                                        <input type="text" name="stages_title" class="form-control filter-input" value="{{$citizenship->citizenshipTranslation->stages_title}}" placeholder="Page Title">
                                        @error('stages_title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="list_info">Fourth Field Content</label> <span class="text-danger">*</span>
                                        <textarea name="stages_text" class="form-control tinymce" id="content" rows="4" placeholder="Enter your text here">{!! $citizenship->citizenshipTranslation->stages_text ?? $citizenship->citizenshipTranslationEnglish->stages_text  ?? null !!}</textarea>
                                        @error('stages_text')
                                        <p class="text-danger">{{ $message }}</p>
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

<script>
    tinymce.init({
        selector: '#content', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code table lists',
        toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
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
