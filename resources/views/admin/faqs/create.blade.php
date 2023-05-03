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
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="list_info">Description</label> <span class="text-danger">*</span>
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
