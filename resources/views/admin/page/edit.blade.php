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
                            <form action="{{route('admin.page.update',$page->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="local" value="{{$locale}}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Title:</label><span class="text-danger">*</span>
                                            <input type="text" name="title" class="form-control filter-input {{ $errors->has('title') ? 'has-error' : '' }}" placeholder="Title" value="{{$page->title}}">
                                            @if($errors->has('title'))
                                                <span class="help-block text-danger">
                                                <strong> {{ $errors->first('title') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Slug:</label><span class="text-danger">*</span>
                                            <input type="text" name="slug" class="form-control filter-input {{ $errors->has('slug') ? 'has-error' : '' }}" placeholder="slug" value="{{$page->slug}}">
                                            @if($errors->has('slug'))
                                                <span class="help-block text-danger">
                                                <strong> {{ $errors->first('slug') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Status</label>
                                        <select name="status" class="listing-input hero__form-input  form-control custom-select {{ $errors->has('status') ? 'has-error' : '' }}">
                                            <option value="">Select</option>
                                            <option value="1" {{$page->status == 1 ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{$page->status == 0 ? 'selected' : ''}}>Inactive</option>
                                        </select>
                                        @if($errors->has('status'))
                                            <span class="help-block text-danger">
                                            <strong> {{ $errors->first('status') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <div class="user-image mb-3 text-center">
                                            <img loading="lazy" src="{{ URL::asset('/images/images/'.$page->file)  }}" alt="" id="preview-image-before-upload">
                                        </div>
                                        <div class="form-group">
                                            <label for="">File:(image/page)</label> <span class="text-danger">*</span>
                                            <input type="file" name="file" class="form-control" id="photo-upload" value="{{$page->file}}">
                                            @error('file')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="list_info">Description</label> <span class="text-danger">*</span>
                                            <textarea name="description" class="form-control" id="list_info" rows="4" placeholder="Enter your text here">{{ $page->pageTranslation->description ?? $page->pageTranslationEnglish->description ?? null }}</textarea>
                                            @error('description')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="list_info">Content</label> <span class="text-danger">*</span>
                                            <textarea name="content" class="form-control tinymce" id="content" rows="4" placeholder="Enter your text here">{{ $page->pageTranslation->content ?? $page->pageTranslationEnglish->content ?? null }}</textarea>
                                            @error('content')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-5">
                                        <div class="add-btn">
                                            <button class="btn v3">SAVE</button>
                                            <a href="{{route('admin.page.index')}}" class="btn v2">Back</a>
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
<script>
    tinymce.init({
        selector: '#content', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code table lists',
        toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    });
</script>
@endpush
