@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Edit Blog:</h5>
                        </div>
                        <div class="db-add-listing">
                            <form action="{{route('admin.blogs.update',$blog)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="locale" value="{{$locale}}">
                                <div class="row">
                                    <input type="hidden" name="user_id" value="{{$blog->user_id}}">
                                    @can('isAdmin')
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Moderation Status</label>
                                            <select class="listing-input hero__form-input form-control custom-select" name="status">
                                                <option value="">Select</option>
                                                <option value="pending" {{$blog->status == 'pending' ? 'selected' : ''}}>PENDING</option>
                                                <option value="approved" {{$blog->status == 'approved' ? 'selected' : ''}}>APPROVED</option>
                                                <option value="rejected" {{$blog->status == 'rejected' ? 'selected' : ''}}>REJECTED</option>
                                            </select>
                                        </div>
                                    </div>
                                    @endcan
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="listing-input hero__form-input form-control custom-select" name="category_id">
                                                {{-- @if(old('category_id', $category->id)) --}}
                                                <option value="">Select</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" {{ old('category_id',$blog->category_id) == $category->id ? 'selected' : ''}}>{{$category->blogCategoryTranslation->name ?? $category->blogCategoryTranslationEnglish->name  ?? null }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Title:</label> <span class="text-danger">*</span>
                                            <input type="text" name="title"
                                             @if(isset($blogTranslation->title)) value="{{old('title', $blogTranslation->title) }}" @else value="{{ old('title') }}" @endif
                                             class="form-control filter-input" id="title" placeholder="Name">
                                            @error('title')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Slug:</label> <span class="text-danger">*</span>
                                            <input type="text" name="slug"  @if(isset($blog->slug)) value="{{ old('slug', $blog->slug) }}" @else value="{{ old('slug') }}" @endif class="form-control filter-input" id="slug" placeholder="/slug">
                                            @error('slug')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tag:</label> <span class="text-danger">*</span>
                                            <select name="tags[]" id="" class="form-control" multiple>
                                                <option value="">Select</option>
                                                @foreach($tags as $tag)
                                                    <option value="{{$tag->id}}"
                                                    @foreach($blog->tags as $t)
                                                        {{$t->id == $tag->id ? 'selected' : ''}}
                                                    @endforeach
                                                    >{{$tag->tagTranslation->name ?? $tag->tagTranslationEnglish->name  ?? null }}</option>
                                                @endforeach
                                            </select>
                                            @error('tag')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="image" id="photo-upload">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="user-image mb-3 text-center">
                                            <img loading="lazy" src="{{ URL::asset('/images/thumbnail/'.$blog->image)  }}" alt="" id="preview-image-before-upload" style="width: 350px;height: 254px;">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="body">Content</label> <span class="text-danger">*</span>
                                            <textarea name="body" class="form-control" id="body" rows="4" placeholder="Enter your text here">{!! $blog->blogTranslation->body ?? $blog->blogTranslationEnglish->body  ?? null !!}</textarea>
                                            @error('body')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
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
@push('scripts')

<script>
    tinymce.init({
      selector: '#body',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount code',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat | code ',
      /* enable title field in the Image dialog*/
  image_title: true,
  /* enable automatic uploads of images represented by blob or data URIs*/
  automatic_uploads: true,
  /*
    URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
    images_upload_url: 'postAcceptor.php',
    here we add custom filepicker only to Image dialog
  */
  file_picker_types: 'image',
  /* and here's our custom image picker*/
  file_picker_callback: (cb, value, meta) => {
    const input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');

    input.addEventListener('change', (e) => {
      const file = e.target.files[0];

      const reader = new FileReader();
      reader.addEventListener('load', () => {
        /*
          Note: Now we need to register the blob in TinyMCEs image blob
          registry. In the next release this part hopefully won't be
          necessary, as we are looking to handle it internally.
        */
        const id = 'blobid' + (new Date()).getTime();
        const blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        const base64 = reader.result.split(',')[1];
        const blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

        /* call the callback and populate the Title field with the file name */
        cb(blobInfo.blobUri(), { title: file.name });
      });
      reader.readAsDataURL(file);
    });

    input.click();
  },
    });
  </script>
<!--<script src="{{asset('ckeditor/ckeditor.js')}}"></script>-->
<script type="text/javascript">
    (function ($) {
        "use strict";

        $('#photo-upload').change(function(){

        let reader = new FileReader();

        reader.onload = (e) => {

            $('#preview-image-before-upload').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);

        });
        $('.ckeditor').ckeditor();
    })(jQuery);
</script>
@endpush
