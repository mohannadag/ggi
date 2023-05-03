@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Edit FAQ :</h5>
                        </div>


                        <div class="db-add-listing">
                            <form action="{{route('admin.faqs.update',$faq->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="local" value="{{$locale}}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Question:</label><span class="text-danger">*</span>
                                            <input type="text" name="question" class="form-control filter-input {{ $errors->has('question') ? 'has-error' : '' }}" placeholder="Title" value="{{$faq->faqTranslation->question}}">
                                            @if($errors->has('question'))
                                                <span class="help-block text-danger">
                                                <strong> {{ $errors->first('question') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category </label>
                                            <select name="category" class="listing-input hero__form-input  form-control custom-select">
                                                <option value="1" @if(isset($faq->category)) {{$faq->category == '1' ? 'selected' : ''}} @endif>FAQ</option>
                                                <option value="2" @if(isset($faq->category)) {{$faq->category == '2' ? 'selected' : ''}} @endif>Guide</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="list_info">Answer</label> <span class="text-danger">*</span>
                                            <textarea name="description" class="form-control" id="list_info" rows="4" placeholder="Enter your text here">{{$faq->faqTranslation->description}}</textarea>
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
                                            <input type="number" name="order" class="form-control filter-input" placeholder="Order" value="{{$faq->order}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Status</label>
                                        <select name="status" class="listing-input hero__form-input  form-control custom-select {{ $errors->has('status') ? 'has-error' : '' }}">
                                            <option value="">Select</option>
                                            <option value="1" {{$faq->status == 1 ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{$faq->status == 0 ? 'selected' : ''}}>Inactive</option>
                                        </select>
                                        @if($errors->has('status'))
                                            <span class="help-block text-danger">
                                            <strong> {{ $errors->first('status') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Guide Order </label>
                                                <input type="text" name="gorder" class="form-control filter-input" placeholder="Link" value="{{$faq->gorder}}">
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-5">
                                        <div class="add-btn">
                                            <button class="btn v3">SAVE</button>
                                            <a href="{{route('admin.faqs.index')}}" class="btn v2">Back</a>
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
