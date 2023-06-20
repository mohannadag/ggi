@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Faq :</h5>
                        </div>


                        <div class="db-add-listing">
                            <form action="{{route('admin.faqs.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Question:</label><span class="text-danger">*</span>
                                        <input type="text" name="question" class="form-control filter-input {{ $errors->has('name') ? 'has-error' : '' }}" placeholder="Title">
                                        @if($errors->has('name'))
                                            <span class="help-block text-danger">
                                            <strong> {{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category </label>
                                        <select name="category" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="1" {{ old('category') == '1' ? 'selected' : '' }}>FAQ</option>
                                            <option value="2" {{ old('category') == '2' ? 'selected' : '' }}>Guide</option>
                                            <option value="3" {{ old('category') == '3' ? 'selected' : '' }}>Citizenship</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label> <span class="text-danger">*</span>
                                        <textarea name="description" class="form-control" id="description" rows="4" placeholder="Enter your text here">{{old('description')}}</textarea>
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Guide Order </label>
                                            <input type="text" name="gorder" class="form-control filter-input" placeholder="Order" value="{{ old('gorder') }}">
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


@push('scripts')
<script>
    tinymce.init({
      selector: '#description',
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

  @endpush
