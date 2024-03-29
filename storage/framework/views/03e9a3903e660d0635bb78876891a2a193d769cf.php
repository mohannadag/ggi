<?php $__env->startPush('styles'); ?>
<style>
    .imgPreview img {
    padding: 8px;
   max-width: 100px;
    }
    </style>
   <style>
       .images-preview-div img {
           padding: 10px;
           max-width: 100px;
       }
   </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="dash-content">
        <div class="container-fluid">
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
            <div class="row">
            <form action="<?php echo e(route('admin.properties.update',$property->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <input type="hidden" name="local" value="<?php echo e($locale); ?>">
                <div class="col-md-12">
                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Edit Property Information :</h5>
                        </div>
                        <div class="db-add-listing">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="user_id" value="<?php echo e($property->user_id); ?>">
                                    <input type="hidden" name="package_id" value="<?php echo e($property->package_id); ?>">
                                </div>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Moderation Status</label>
                                            <select name="moderation_status" class="listing-input hero__form-input  form-control custom-select">
                                                <option value="">Select</option>
                                                <option value="0" <?php echo e($property->moderation_status == "0" ? 'selected' : ''); ?>>Pending</option>
                                                <option value="1" <?php echo e($property->moderation_status == "1" ? 'selected' : ''); ?>>Approved</option>
                                            </select>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isMod')): ?>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Moderation Status</label>
                                            <select name="moderation_status" class="listing-input hero__form-input  form-control custom-select">
                                                <option value="">Select</option>
                                                <option value="0" <?php echo e($property->moderation_status == "0" ? 'selected' : ''); ?>>Pending</option>
                                                <option value="1" <?php echo e($property->moderation_status == "1" ? 'selected' : ''); ?>>Approved</option>
                                            </select>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Property Title</label>
                                        <input type="text" name="title" class="form-control filter-input" <?php if(isset($propertyTranslation->title)): ?> value="<?php echo e($propertyTranslation->title); ?>" <?php else: ?> value="" <?php endif; ?> placeholder="Property Title">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Property Type</label>
                                    <select name="type" class="listing-input hero__form-input  form-control custom-select">
                                        <option>Select</option>
                                        <option value="<?php echo e('sale'); ?>" <?php echo e($property->type == 'sale' ? 'selected' : ''); ?>>Sale</option>
                                        <option value="<?php echo e('rent'); ?>" <?php echo e($property->type == 'rent' ? 'selected' : ''); ?>>Rent</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Suitable for Citizenship?</label>
                                    <select name="citizenship" class="listing-input hero__form-input  form-control custom-select">
                                        <option>Select</option>
                                        <option value="<?php echo e('1'); ?>" <?php echo e($property->propertyDetails->citizenship == '1' ? 'selected' : ''); ?>>Yes</option>
                                        <option value="<?php echo e('2'); ?>" <?php echo e($property->propertyDetails->citizenship == '2' ? 'selected' : ''); ?>>No</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Category</label>
                                    <select name="category_id" id="category_id" class="listing-input hero__form-input  form-control custom-select">
                                        <option>Select</option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->category_id); ?>" <?php echo e($property->category_id == $category->category_id ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Country:</label>
                                        <select name="country_id" class="listing-input hero__form-input  form-control custom-select <?php echo e($errors->has('country_id') ? 'has-error' : ''); ?>" id="country">
                                            <option value="">Select</option>
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($country->country_id); ?>" <?php echo e($property->country_id == $country->country_id ? 'selected' : ''); ?>><?php echo e($country->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('country_id')): ?>
                                            <span class="help-block text-danger">
                                            <strong> <?php echo e($errors->first('country_id')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>State</label>
                                    <select name="state_id" class="listing-input hero__form-input  form-control custom-select" id="state">
                                        <option value="">Select</option>
                                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($state->state_id); ?>" <?php echo e($property->state_id == $state->state_id ? 'selected' : ''); ?>><?php echo e($state->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>City</label>
                                    <select name="city_id" class="listing-input hero__form-input  form-control custom-select" id="city">
                                        <option value="">Select</option>
                                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($city->city_id); ?>" <?php echo e($property->city_id == $city->city_id ? 'selected' : ''); ?>><?php echo e($city->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Listing Size</label>
                                        <input type="text" name="room_size" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->room_size) ? $property->propertyDetails->room_size : ''); ?>" placeholder="144">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Property ID</label>
                                    <input type="text" name="property_id" class="form-control filter-input" value="<?php echo e($property->property_id); ?>" placeholder="ZOAC25">
                                </div>

                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tag:</label> <span class="text-danger">*</span>
                                            <select name="tag" id="" class="form-control">
                                                <option value="">Select</option>
                                                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->tagTranslation->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['tag'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Property Price</label>
                                        <input type="text" name="price" class="form-control filter-input" value="<?php echo e($property->price); ?>" placeholder="$1500">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Currency</label>
                                        <select name="currency_id" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select</option>
                                            <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($currency->id); ?>" <?php echo e($property->currency_id == $currency->id ? 'selected' : ''); ?>><?php echo e($currency->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Is Featured</label>
                                        <input type="checkbox" name="is_featured" data-toggle="toggle" data-on="featured" data-off="not featured" data-onstyle="success" data-offstyle="danger" <?php echo e($property->is_featured == 1 ? 'checked' : ''); ?>>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="db-add-list-wrap">
                        <div class="db-add-listing">
                            <div class="row">

                                    <div class="col-md-12 mt-30">
                                        <div class="form-group">
                                        <label>Property Video Link</label>
                                        <input type="text" name="video" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->video) ? $property->propertyDetails->video : ''); ?>" placeholder="Video Link Here">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-30">
                                        <div class="form-group">
                                        <label>Drive Link</label>
                                        <input type="text" name="drive_link" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->drive_link) ? $property->propertyDetails->drive_link : ''); ?>" placeholder="Google Drive Link">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-30">
                                        <div class="form-group">
                                        <label>Floor Plans Link</label>
                                        <input type="text" name="plans_link" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->plans_link) ? $property->propertyDetails->plans_link : ''); ?>" placeholder="Plans Link">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-30">
                                        <div class="form-group">
                                        <label>Word Link</label>
                                        <input type="text" name="word_link" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->word_link) ? $property->propertyDetails->word_link : ''); ?>" placeholder="Word Link">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-30">
                                        <div class="form-group">
                                        <label>Prices Link</label>
                                        <input type="text" name="prices_link" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->prices_link) ? $property->propertyDetails->prices_link : ''); ?>" placeholder="Prices Drive Link">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-30">
                                        <div class="form-group">
                                        <label>Whatsapp Link</label>
                                        <input type="text" name="whatsapp_link" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->whatsapp_link) ? $property->propertyDetails->whatsapp_link : ''); ?>" placeholder="Whatsapp Link">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-30">
                                        <div class="form-group">
                                        <label>Presentation Link</label>
                                        <input type="text" name="presentation" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->presentation) ? $property->propertyDetails->presentation : ''); ?>" placeholder="Presentation Link Here">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-30">
                                        <div class="form-group">
                                        <label>IVR Link</label>
                                        <input type="text" name="ivr" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->ivr) ? $property->propertyDetails->ivr : ''); ?>" placeholder="IVR Link">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <form>
                                            <div class="form-group">
                                                <label for="list_info">Description</label>
                                                <textarea name="description" class="form-control" id="list_info" rows="4" placeholder="Enter your text here"><?php if(isset($propertyTranslation->description)): ?> <?php echo e($propertyTranslation->description); ?>  <?php endif; ?></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="content">Content</label>
                                                <textarea name="content" class="form-control" id="content" rows="4" placeholder="Enter your text here"><?php echo e($property->propertyDetails->propertyDetailTranslation->content ?? $property->propertyDetails->propertyDetailTranslationEnglish->content ?? null); ?></textarea>
                                            </div>
                                    </div>
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="location">Location</label>
                                                <textarea name="location_info" class="form-control" id="location_info" rows="4" placeholder="Enter your text here"><?php echo e($property->propertyDetails->propertyDetailTranslation->location_info ?? $property->propertyDetails->propertyDetailTranslationEnglish->location_info ?? null); ?></textarea>
                                            </div>
                                    </div>
                                    <?php
                                    foreach($property->facilities as $key => $f)
                                    {

                                        $fac[] = $f->id;

                                    }

                                ?>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Facilities</label>
                                        <div>
                                            <?php $__currentLoopData = $facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <input id="check-a" type="checkbox" name="facility_id[]" value="<?php echo e($facility->facility_id); ?>"
                                                   <?php $__currentLoopData = $property->facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   <?php if($facility->facility_id == $f->id): ?>
                                                   checked
                                                    <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                            <label for="check-a"><?php echo e($facility->name); ?></label>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>

                                    <div class="col-md-12 mb-4">
                                        <div class="user-image mb-3 text-center">
                                            <img loading="lazy" src="<?php echo e(URL::asset('/images/thumbnail/'.$property->thumbnail)); ?>" alt="" id="preview-image-before-upload" style="width: 350px;height: 254px;">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Thumbnail Image</label> <span class="text-danger">*</span>
                                            <input type="file" name="thumbnail" class="form-control" id="photo-upload" value="<?php echo e($property->thumbnail); ?>">
                                            <?php $__errorArgs = ['thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-5">
                                    <div class="act-title">
                                        <h5>Gallery :</h5>
                                    </div>
                                    <?php
                                        $pic = json_decode($property->image->name);
                                    ?>
                                    
                                        
                                            
                                                    
                                            
                                        
                                    
                                    <div class="col-md-12">
                                        <div class="mt-1 text-center">
                                            <div class="images-preview-div">
                                                <?php $__currentLoopData = $pic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <input type="hidden" name="oldImages[]" value="<?php echo e($p); ?>" multiple>
                                                <div class="d-flex" id="<?php echo e($key); ?>">
                                                <img class="1" loading="lazy" src="<?php echo e(URL::asset('images/gallery/'.$p)); ?>" alt="slide" >
                                                <span><i class="las la-trash old-image 1" data-id="<?php echo e($p); ?>" data-property=<?php echo e($property->id); ?>  style="padding-top: 25px;pointer:cursor"></i></span>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="add-listing__input-file-box">
                                                <input class="add-listing__input-file" type="file" name="images[]" multiple="multiple" id="images">
                                                <div class="add-listing__input-file-wrap">
                                                    <i class="lnr lnr-cloud-upload"></i>
                                                    <p>Click here to upload your images</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if($property->category_id == '5'): ?>
                    <div class="db-add-list-wrap" id="project">
                        <div class="act-title">
                        <h5>Project Details:</h5>
                        </div>
                        <div class="db-add-listing">
                            <div class="row mb-30">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Number of Blocks</label>
                                        <input type="number" name="blocks" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->blocks) ? $property->propertyDetails->blocks : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Delivery Month</label>
                                        <input type="number" name="delivery_month" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->delivery_month) ? $property->propertyDetails->delivery_month : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Delivery Years</label>
                                        <input type="number" name="deliver_year" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->deliver_year) ? $property->propertyDetails->deliver_year : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Units Count</label>
                                    <input type="number" name="total_units" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->total_units) ? $property->propertyDetails->total_units : ''); ?>">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Units Per Floor</label>
                                        <input type="number" name="units_infloors" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->units_infloors) ? $property->propertyDetails->units_infloors : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Available Floors</label>
                                        <input type="number" name="available_floors" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->available_floors) ? $property->propertyDetails->available_floors : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Building Age</label>
                                        <input type="number" name="building_age" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->building_age) ? $property->propertyDetails->building_age : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>View</label>
                                        <select name="view" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select Option</option>
                                            <option value="1" <?php if(isset($property->propertyDetails->view)): ?> <?php echo e($property->propertyDetails->view == '1' ? 'selected' : ''); ?> <?php endif; ?>><?php echo e(trans('file.na')); ?></option>
                                            <option value="<?php echo e('2'); ?>" <?php if(isset($property->propertyDetails->view)): ?> <?php echo e($property->propertyDetails->view == '2' ? 'selected' : ''); ?> <?php endif; ?>><?php echo e(trans('file.view_sea')); ?></option>
                                            <option value="<?php echo e('3'); ?>" <?php if(isset($property->propertyDetails->view)): ?> <?php echo e($property->propertyDetails->view == '3' ? 'selected' : ''); ?> <?php endif; ?>><?php echo e(trans('file.view_forest')); ?></option>
                                            <option value="<?php echo e('4'); ?>" <?php if(isset($property->propertyDetails->view)): ?> <?php echo e($property->propertyDetails->view == '4' ? 'selected' : ''); ?> <?php endif; ?>><?php echo e(trans('file.view_street')); ?></option>
                                            <option value="<?php echo e('5'); ?>" <?php if(isset($property->propertyDetails->view)): ?> <?php echo e($property->propertyDetails->view == '5' ? 'selected' : ''); ?> <?php endif; ?>><?php echo e(trans('file.view_landscape')); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Maintenance Fees</label>
                                        <input type="number" name="maintenance_fee" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->maintenance_fee) ? $property->propertyDetails->maintenance_fee : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Social Facilities Size</label>
                                        <input type="number" name="landscape" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->landscape) ? $property->propertyDetails->landscape : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Heating System</label>
                                    <select name="heating" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select Option</option>
                                        <option value="1" <?php if(isset($property->propertyDetails->heating)): ?> <?php echo e($property->propertyDetails->heating == '1' ? 'selected' : ''); ?> <?php endif; ?>><?php echo e(trans('file.na')); ?></option>
                                        <option value="2" <?php if(isset($property->propertyDetails->heating)): ?> <?php echo e($property->propertyDetails->heating == '2' ? 'selected' : ''); ?> <?php endif; ?>><?php echo e(trans('file.central_heating')); ?></option>
                                        <option value="3" <?php if(isset($property->propertyDetails->heating)): ?> <?php echo e($property->propertyDetails->heating == '3' ? 'selected' : ''); ?> <?php endif; ?>><?php echo e(trans('file.natural_gas')); ?></option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Title Deed Type</label>
                                    <select name="title_deed_type" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select Option</option>
                                        <option value="1" <?php if(isset($property->propertyDetails->title_deed_type)): ?> <?php echo e($property->propertyDetails->title_deed_type == '1' ? 'selected' : ''); ?> <?php endif; ?>>Ready</option>
                                        <option value="2" <?php if(isset($property->propertyDetails->title_deed_type)): ?> <?php echo e($property->propertyDetails->title_deed_type == '2' ? 'selected' : ''); ?> <?php endif; ?>>Under Construction</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Cash Option</label>
                                    <select name="cash" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select Option</option>
                                        <option value="1" <?php if(isset($property->propertyDetails->cash)): ?> <?php echo e($property->propertyDetails->cash == '1' ? 'selected' : ''); ?> <?php endif; ?>><?php echo e(trans('file.No')); ?></option>
                                        <option value="2" <?php if(isset($property->propertyDetails->cash)): ?> <?php echo e($property->propertyDetails->cash == '2' ? 'selected' : ''); ?> <?php endif; ?>><?php echo e(trans('file.Yes')); ?></option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Installment Option</label>
                                    <select name="installments" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select Option</option>
                                        <option value="1" <?php if(isset($property->propertyDetails->installments)): ?> <?php echo e($property->propertyDetails->installments == '1' ? 'selected' : ''); ?> <?php endif; ?>><?php echo e(trans('file.No')); ?></option>
                                        <option value="2" <?php if(isset($property->propertyDetails->installments)): ?> <?php echo e($property->propertyDetails->installments == '2' ? 'selected' : ''); ?> <?php endif; ?>><?php echo e(trans('file.Yes')); ?></option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Mortgage</label>
                                    <select name="creditability" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select Option</option>
                                        <option value="1" <?php if(isset($property->propertyDetails->creditability)): ?> <?php echo e($property->propertyDetails->creditability == '1' ? 'selected' : ''); ?> <?php endif; ?>><?php echo e(trans('file.No')); ?></option>
                                        <option value="2" <?php if(isset($property->propertyDetails->creditability)): ?> <?php echo e($property->propertyDetails->creditability == '2' ? 'selected' : ''); ?> <?php endif; ?>><?php echo e(trans('file.Yes')); ?></option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Exchangable</label>
                                    <select name="convertability" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select Option</option>
                                        <option value="No" <?php if(isset($property->propertyDetails->convertability)): ?> <?php echo e($property->propertyDetails->convertability == 'No' ? 'selected' : ''); ?> <?php endif; ?>>No</option>
                                        <option value="Yes" <?php if(isset($property->propertyDetails->convertability)): ?> <?php echo e($property->propertyDetails->convertability == 'Yes' ? 'selected' : ''); ?> <?php endif; ?>>Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Units Type</label>
                                        <select class="listing-input hero__form-input  form-control custom-select" name="bed[]" multiple="">
                                            <option value="">Select Option</option>
                                            <option value="1" >0+1</option>
                                            <option value="2" >1+1</option>
                                            <option value="3" >1+2</option>
                                            <option value="4" >1+3</option>
                                            <option value="5" >1+4</option>
                                            <option value="6" >1+5</option>
                                            <option value="7" >1+6</option>
                                            <option value="8" >1+7</option>
                                            <option value="9" >1+8</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if($property->category_id == '1' && $property->category_id == '4'): ?>
                    <div class="db-add-list-wrap" id="property">
                        <div class="act-title">
                            <h5>Property Details :</h5>
                        </div>
                        <div class="db-add-listing">
                            <div class="row mb-30">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Number of Bath</label>
                                        <input type="number" name="bath" id="bath" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->bath) ? $property->propertyDetails->bath : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Number of Garages</label>
                                        <input type="number" name="garage" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->garage) ? $property->propertyDetails->garage : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Select Floor</label>
                                     <input type="number" name="floor" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->floor) ? $property->propertyDetails->floor : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Inside Project</label>
                                    <select name="inside_project" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select Option</option>
                                        <option value="1" <?php echo e($property->inside_project == '1' ? 'selected' : ''); ?>>No</option>
                                        <option value="2" <?php echo e($property->inside_project == '2' ? 'selected' : ''); ?>>Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if($property->category_id == '3'): ?>
                    <div class="db-add-list-wrap" id="land">
                        <div class="act-title">
                        <h5>Land Details:</h5>
                        </div>
                        <div class="db-add-listing">
                            <div class="row mb-30">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Island No</label>
                                        <input type="number" name="island_no" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->island_no) ? $property->propertyDetails->island_no : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Sheet No</label>
                                        <input type="number" name="sheet_no" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->sheet_no) ? $property->propertyDetails->sheet_no : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Precedent Value</label>
                                        <input type="number" name="precedent_value" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->precedent_value) ? $property->propertyDetails->precedent_value : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Gauge</label>
                                        <input type="number" name="gauge" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->gauge) ? $property->propertyDetails->gauge : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Parcel Number</label>
                                        <input type="number" name="parcel" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->parcel) ? $property->propertyDetails->parcel : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Heating System</label>
                                    <select name="heating" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select Option</option>
                                        <option value="1" <?php if(isset($property->propertyDetails->heating)): ?> <?php echo e($property->propertyDetails->heating == '1' ? 'selected' : ''); ?> <?php endif; ?>><?php echo e(trans('file.na')); ?></option>
                                        <option value="2" <?php if(isset($property->propertyDetails->heating)): ?> <?php echo e($property->propertyDetails->heating == '2' ? 'selected' : ''); ?> <?php endif; ?>><?php echo e(trans('file.central_heating')); ?></option>
                                        <option value="3" <?php if(isset($property->propertyDetails->heating)): ?> <?php echo e($property->propertyDetails->heating == '3' ? 'selected' : ''); ?> <?php endif; ?>><?php echo e(trans('file.natural_gas')); ?></option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Title Deed Type</label>
                                    <select name="title_deed_type" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select Option</option>
                                        <option value="1" <?php if(isset($property->propertyDetails->title_deed_type)): ?> <?php echo e($property->propertyDetails->title_deed_type == '1' ? 'selected' : ''); ?> <?php endif; ?>><?php echo e(trans('file.condominium')); ?></option>
                                        <option value="2" <?php if(isset($property->propertyDetails->title_deed_type)): ?> <?php echo e($property->propertyDetails->title_deed_type == '2' ? 'selected' : ''); ?> <?php endif; ?>><?php echo e(trans('file.easement')); ?></option>
                                        <option value="3" <?php if(isset($property->propertyDetails->title_deed_type)): ?> <?php echo e($property->propertyDetails->title_deed_type == '3' ? 'selected' : ''); ?> <?php endif; ?>><?php echo e(trans('file.shared')); ?></option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Mortgage</label>
                                    <select name="creditability" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select Option</option>
                                        <option value="1" <?php if(isset($property->propertyDetails->creditability)): ?> <?php echo e($property->propertyDetails->creditability == '1' ? 'selected' : ''); ?> <?php endif; ?>><?php echo e(trans('file.No')); ?></option>
                                        <option value="2" <?php if(isset($property->propertyDetails->creditability)): ?> <?php echo e($property->propertyDetails->creditability == '2' ? 'selected' : ''); ?> <?php endif; ?>><?php echo e(trans('file.Yes')); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>1st Floor Plans:</h5>
                        </div>
                        <div class="db-add-listing">
                            <div class="row mb-30">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>1st Floor Title</label>
                                        <input type="text" name="first_floor_title" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->first_floor_title) ? $property->propertyDetails->first_floor_title : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>1st Floor Sold</label>
                                    <select name="first_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select Option</option>
                                        <option value="1" <?php if(isset($property->propertyDetails->first_floor_sold)): ?> <?php echo e($property->propertyDetails->first_floor_sold == '1' ? 'selected' : ''); ?> <?php endif; ?>>No</option>
                                        <option value="2" <?php if(isset($property->propertyDetails->first_floor_sold)): ?> <?php echo e($property->propertyDetails->first_floor_sold == '2' ? 'selected' : ''); ?> <?php endif; ?>>Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>1st Floor Min. size</label>
                                        <input type="number" name="first_floor_size" step="0.01" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->first_floor_size) ? $property->propertyDetails->first_floor_size : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>1st Floor Max. size</label>
                                        <input type="number" name="first_floor_max_size" step="0.01" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->first_floor_max_size) ? $property->propertyDetails->first_floor_max_size : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>1st Floor Rooms</label>
                                        <input type="number" name="first_floor_rooms" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->first_floor_rooms) ? $property->propertyDetails->first_floor_rooms : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>1st Floor Baths</label>
                                        <input type="number" name="first_floor_baths" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->first_floor_baths) ? $property->propertyDetails->first_floor_baths : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>1st Floor Min. Price</label> <span class="text-danger">*</span>
                                        <input type="text" name="first_floor_price" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->first_floor_price) ? $property->propertyDetails->first_floor_price : '0.00'); ?>">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>1st Floor Max. Price</label> <span class="text-danger">*</span>
                                        <input type="text" name="first_floor_max_price" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->first_floor_max_price) ? $property->propertyDetails->first_floor_max_price : '0.00'); ?>">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12 mb-4">
                                            <div class="user-image mb-3 text-center">
                                                <img loading="lazy" src="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->first_floor_picture)); ?>" alt="" id="preview-image-before-upload">
                                            </div>
                                            <div class="form-group">
                                                <label for="">File:(image/slider)</label>
                                                <input type="file" name="first_floor_picture" class="form-control" id="photo-upload" value="<?php echo e($property->propertyDetails->first_floor_picture); ?>">
                                                <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>2nd Floor Plans:</h5>
                        </div>
                        <div class="db-add-listing">
                            <div class="row mb-30">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>2nd Floor Title</label>
                                        <input type="text" name="second_floor_title" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->second_floor_title) ? $property->propertyDetails->second_floor_title : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>2nd Floor Sold</label>
                                    <select name="second_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select Option</option>
                                        <option value="1" <?php if(isset($property->propertyDetails->second_floor_sold)): ?> <?php echo e($property->propertyDetails->second_floor_sold == '1' ? 'selected' : ''); ?> <?php endif; ?>>No</option>
                                        <option value="2" <?php if(isset($property->propertyDetails->second_floor_sold)): ?> <?php echo e($property->propertyDetails->second_floor_sold == '2' ? 'selected' : ''); ?> <?php endif; ?>>Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>2nd Floor Min. size</label>
                                        <input type="number" name="second_floor_size" step="0.01" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->second_floor_size) ? $property->propertyDetails->second_floor_size : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>2nd Floor Max. size</label>
                                        <input type="number" name="second_floor_max_size" step="0.01" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->second_floor_max_size) ? $property->propertyDetails->second_floor_max_size : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>2nd Floor Rooms</label>
                                        <input type="number" name="second_floor_rooms" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->second_floor_rooms) ? $property->propertyDetails->second_floor_rooms : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>2nd Floor Baths</label>
                                        <input type="number" name="second_floor_baths" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->second_floor_baths) ? $property->propertyDetails->second_floor_baths : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>2nd Floor Min. Price</label> <span class="text-danger">*</span>
                                        <input type="text" name="second_floor_price" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->second_floor_price) ? $property->propertyDetails->second_floor_price : '0.00'); ?>">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>2nd Floor Max. Price</label> <span class="text-danger">*</span>
                                        <input type="text" name="second_floor_max_price" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->second_floor_max_price) ? $property->propertyDetails->second_floor_max_price : '0.00'); ?>">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12 mb-4">
                                            <div class="user-image mb-3 text-center">
                                                <img loading="lazy" src="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->second_floor_picture)); ?>" alt="" id="preview-image-before-upload">
                                            </div>
                                            <div class="form-group">
                                                <label for="">File:(image/slider)</label>
                                                <input type="file" name="second_floor_picture" class="form-control" id="photo-upload" value="<?php echo e($property->propertyDetails->second_floor_picture); ?>">
                                                <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>3rd Floor Plans:</h5>
                        </div>
                        <div class="db-add-listing">
                            <div class="row mb-30">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>3rd Floor Title</label>
                                        <input type="text" name="third_floor_title" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->third_floor_title) ? $property->propertyDetails->third_floor_title : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>3rd Floor Sold</label>
                                    <select name="third_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select Option</option>
                                        <option value="1" <?php if(isset($property->propertyDetails->third_floor_sold)): ?> <?php echo e($property->propertyDetails->third_floor_sold == '1' ? 'selected' : ''); ?> <?php endif; ?>>No</option>
                                        <option value="2" <?php if(isset($property->propertyDetails->third_floor_sold)): ?> <?php echo e($property->propertyDetails->third_floor_sold == '2' ? 'selected' : ''); ?> <?php endif; ?>>Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>3rd Floor Min. size</label>
                                        <input type="number" name="third_floor_size" step="0.01" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->third_floor_size) ? $property->propertyDetails->third_floor_size : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>3rd Floor Max. size</label>
                                        <input type="number" name="third_floor_max_size" step="0.01" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->third_floor_max_size) ? $property->propertyDetails->third_floor_max_size : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>3rd Floor Rooms</label>
                                        <input type="number" name="third_floor_rooms" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->third_floor_rooms) ? $property->propertyDetails->third_floor_rooms : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>3rd Floor Baths</label>
                                        <input type="number" name="third_floor_baths" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->third_floor_baths) ? $property->propertyDetails->third_floor_baths : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>3rd Floor Min. Price</label> <span class="text-danger">*</span>
                                        <input type="text" name="third_floor_price" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->third_floor_price) ? $property->propertyDetails->third_floor_price : '0.00'); ?>">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>3rd Floor Max. Price</label> <span class="text-danger">*</span>
                                        <input type="text" name="third_floor_max_price" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->third_floor_max_price) ? $property->propertyDetails->third_floor_max_price : '0.00'); ?>">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12 mb-4">
                                            <div class="user-image mb-3 text-center">
                                                <img loading="lazy" src="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->third_floor_picture)); ?>" alt="" id="preview-image-before-upload">
                                            </div>

                                            <div class="form-group">
                                                <label for="">File:(image/slider)</label>
                                                <input type="file" name="third_floor_picture" class="form-control" id="photo-upload" value="<?php echo e($property->propertyDetails->third_floor_picture); ?>">
                                                <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>4th Floor Plans:</h5>
                        </div>
                        <div class="db-add-listing">
                            <div class="row mb-30">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>4th Floor Title</label>
                                        <input type="text" name="fourth_floor_title" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->fourth_floor_title) ? $property->propertyDetails->fourth_floor_title : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>4th Floor Sold</label>
                                    <select name="fourth_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select Option</option>
                                        <option value="1" <?php if(isset($property->propertyDetails->fourth_floor_sold)): ?> <?php echo e($property->propertyDetails->fourth_floor_sold == '1' ? 'selected' : ''); ?> <?php endif; ?>>No</option>
                                        <option value="2" <?php if(isset($property->propertyDetails->fourth_floor_sold)): ?> <?php echo e($property->propertyDetails->fourth_floor_sold == '2' ? 'selected' : ''); ?> <?php endif; ?>>Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>4th Floor Min. size</label>
                                        <input type="number" name="fourth_floor_size" step="0.01" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->fourth_floor_size) ? $property->propertyDetails->fourth_floor_size : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>4th Floor Max. size</label>
                                        <input type="number" name="fourth_floor_max_size" step="0.01" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->fourth_floor_max_size) ? $property->propertyDetails->fourth_floor_max_size : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>4th Floor Rooms</label>
                                        <input type="number" name="fourth_floor_rooms" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->fourth_floor_rooms) ? $property->propertyDetails->fourth_floor_rooms : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>4th Floor Baths</label>
                                        <input type="number" name="fourth_floor_baths" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->fourth_floor_baths) ? $property->propertyDetails->fourth_floor_baths : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>4th Floor Min. Price</label> <span class="text-danger">*</span>
                                        <input type="text" name="fourth_floor_price" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->fourth_floor_price) ? $property->propertyDetails->fourth_floor_price : '0.00'); ?>">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>4th Floor Max. Price</label> <span class="text-danger">*</span>
                                        <input type="text" name="fourth_floor_max_price" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->fourth_floor_max_price) ? $property->propertyDetails->fourth_floor_max_price : '0.00'); ?>">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12 mb-4">
                                            <div class="user-image mb-3 text-center">
                                                <img loading="lazy" src="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->fourth_floor_picture)); ?>" alt="" id="preview-image-before-upload">
                                            </div>

                                            <div class="form-group">
                                                <label for="">File:(image/slider)</label>
                                                <input type="file" name="fourth_floor_picture" class="form-control" id="photo-upload" value="<?php echo e($property->propertyDetails->fourth_floor_picture); ?>">
                                                <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>5th Floor Plans:</h5>
                        </div>
                        <div class="db-add-listing">
                            <div class="row mb-30">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>5th Floor Title</label>
                                        <input type="text" name="fifth_floor_title" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->fifth_floor_title) ? $property->propertyDetails->fifth_floor_title : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>5th Floor Sold</label>
                                    <select name="fifth_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select Option</option>
                                        <option value="1" <?php if(isset($property->propertyDetails->fifth_floor_sold)): ?> <?php echo e($property->propertyDetails->fifth_floor_sold == '1' ? 'selected' : ''); ?> <?php endif; ?>>No</option>
                                        <option value="2" <?php if(isset($property->propertyDetails->fifth_floor_sold)): ?> <?php echo e($property->propertyDetails->fifth_floor_sold == '2' ? 'selected' : ''); ?> <?php endif; ?>>Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>5th Floor Min. size</label>
                                        <input type="number" name="fifth_floor_size" step="0.01" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->fifth_floor_size) ? $property->propertyDetails->fifth_floor_size : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>5th Floor Max. size</label>
                                        <input type="number" name="fifth_floor_max_size" step="0.01" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->fifth_floor_max_size) ? $property->propertyDetails->fifth_floor_max_size : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>5th Floor Rooms</label>
                                        <input type="number" name="fifth_floor_rooms" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->fifth_floor_rooms) ? $property->propertyDetails->fifth_floor_rooms : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>5th Floor Baths</label>
                                        <input type="number" name="fifth_floor_baths" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->fifth_floor_baths) ? $property->propertyDetails->fifth_floor_baths : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>5th Floor Min. Price</label> <span class="text-danger">*</span>
                                        <input type="text" name="fifth_floor_price" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->fifth_floor_price) ? $property->propertyDetails->fifth_floor_price : '0.00'); ?>">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>5th Floor Max. Price</label> <span class="text-danger">*</span>
                                        <input type="text" name="fifth_floor_max_price" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->fifth_floor_max_price) ? $property->propertyDetails->fifth_floor_max_price : '0.00'); ?>">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12 mb-4">
                                            <div class="user-image mb-3 text-center">
                                                <img loading="lazy" src="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->fifth_floor_picture)); ?>" alt="" id="preview-image-before-upload">
                                            </div>

                                            <div class="form-group">
                                                <label for="">File:(image/slider)</label>
                                                <input type="file" name="fifth_floor_picture" class="form-control" id="photo-upload" value="<?php echo e($property->propertyDetails->fifth_floor_picture); ?>">
                                                <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>6th Floor Plans:</h5>
                        </div>
                        <div class="db-add-listing">
                            <div class="row mb-30">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>6th Floor Title</label>
                                        <input type="text" name="sixth_floor_title" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->sixth_floor_title) ? $property->propertyDetails->sixth_floor_title : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>6th Floor Sold</label>
                                    <select name="sixth_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select Option</option>
                                        <option value="1" <?php if(isset($property->propertyDetails->sixth_floor_sold)): ?> <?php echo e($property->propertyDetails->sixth_floor_sold == '1' ? 'selected' : ''); ?> <?php endif; ?>>No</option>
                                        <option value="2" <?php if(isset($property->propertyDetails->sixth_floor_sold)): ?> <?php echo e($property->propertyDetails->sixth_floor_sold == '2' ? 'selected' : ''); ?> <?php endif; ?>>Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>6th Floor Min. size</label>
                                        <input type="number" name="sixth_floor_size" step="0.01" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->sixth_floor_size) ? $property->propertyDetails->sixth_floor_size : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>6th Floor Max. size</label>
                                        <input type="number" name="sixth_floor_max_size" step="0.01" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->sixth_floor_max_size) ? $property->propertyDetails->sixth_floor_max_size : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>6th Floor Rooms</label>
                                        <input type="number" name="sixth_floor_rooms" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->sixth_floor_rooms) ? $property->propertyDetails->sixth_floor_rooms : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>6th Floor Baths</label>
                                        <input type="number" name="sixth_floor_baths" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->sixth_floor_baths) ? $property->propertyDetails->sixth_floor_baths : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>6th Floor Min. Price</label> <span class="text-danger">*</span>
                                        <input type="text" name="sixth_floor_price" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->sixth_floor_price) ? $property->propertyDetails->sixth_floor_price : '0.00'); ?>">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>6th Floor Max. Price</label> <span class="text-danger">*</span>
                                        <input type="text" name="sixth_floor_max_price" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->sixth_floor_max_price) ? $property->propertyDetails->sixth_floor_max_price : '0.00'); ?>">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12 mb-4">
                                            <div class="user-image mb-3 text-center">
                                                <img loading="lazy" src="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->sixth_floor_picture)); ?>" alt="" id="preview-image-before-upload">
                                            </div>

                                            <div class="form-group">
                                                <label for="">File:(image/slider)</label>
                                                <input type="file" name="sixth_floor_picture" class="form-control" id="photo-upload" value="<?php echo e($property->propertyDetails->sixth_floor_picture); ?>">
                                                <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>7th Floor Plans:</h5>
                        </div>
                        <div class="db-add-listing">
                            <div class="row mb-30">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>7th Floor Title</label>
                                        <input type="text" name="seventh_floor_title" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->seventh_floor_title) ? $property->propertyDetails->seventh_floor_title : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>7th Floor Sold</label>
                                    <select name="seventh_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select Option</option>
                                        <option value="1" <?php if(isset($property->propertyDetails->seventh_floor_sold)): ?> <?php echo e($property->propertyDetails->seventh_floor_sold == '1' ? 'selected' : ''); ?> <?php endif; ?>>No</option>
                                        <option value="2" <?php if(isset($property->propertyDetails->seventh_floor_sold)): ?> <?php echo e($property->propertyDetails->seventh_floor_sold == '2' ? 'selected' : ''); ?> <?php endif; ?>>Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>7th Floor Min. size</label>
                                        <input type="number" name="seventh_floor_size" step="0.01" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->seventh_floor_size) ? $property->propertyDetails->seventh_floor_size : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>7th Floor Max. size</label>
                                        <input type="number" name="seventh_floor_max_size" step="0.01" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->seventh_floor_max_size) ? $property->propertyDetails->seventh_floor_max_size : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>7th Floor Rooms</label>
                                        <input type="number" name="seventh_floor_rooms" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->seventh_floor_rooms) ? $property->propertyDetails->seventh_floor_rooms : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>7th Floor Baths</label>
                                        <input type="number" name="seventh_floor_baths" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->seventh_floor_baths) ? $property->propertyDetails->seventh_floor_baths : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>7th Floor Min. Price</label> <span class="text-danger">*</span>
                                        <input type="number" name="seventh_floor_price" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->seventh_floor_price) ? $property->propertyDetails->seventh_floor_price : '0.00'); ?>">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>7th Floor Max. Price</label> <span class="text-danger">*</span>
                                        <input type="number" name="seventh_floor_max_price" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->seventh_floor_max_price) ? $property->propertyDetails->seventh_floor_max_price : '0.00'); ?>">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12 mb-4">
                                            <div class="user-image mb-3 text-center">
                                                <img loading="lazy" src="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->seventh_floor_picture)); ?>" alt="" id="preview-image-before-upload">
                                            </div>

                                            <div class="form-group">
                                                <label for="">File:(image/slider)</label>
                                                <input type="file" name="seventh_floor_picture" class="form-control" id="photo-upload" value="<?php echo e($property->propertyDetails->seventh_floor_picture); ?>">
                                                <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>8th Floor Plans:</h5>
                        </div>
                        <div class="db-add-listing">
                            <div class="row mb-30">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>8th Floor Title</label>
                                        <input type="text" name="eighth_floor_title" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->eighth_floor_title) ? $property->propertyDetails->eighth_floor_title : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>8th Floor Sold</label>
                                    <select name="eighth_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select Option</option>
                                        <option value="1" <?php if(isset($property->propertyDetails->eighth_floor_sold)): ?> <?php echo e($property->propertyDetails->eighth_floor_sold == '1' ? 'selected' : ''); ?> <?php endif; ?>>No</option>
                                        <option value="2" <?php if(isset($property->propertyDetails->eighth_floor_sold)): ?> <?php echo e($property->propertyDetails->eighth_floor_sold == '2' ? 'selected' : ''); ?> <?php endif; ?>>Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>8th Floor Min. size</label>
                                        <input type="number" name="eighth_floor_size" step="0.01" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->eighth_floor_size) ? $property->propertyDetails->eighth_floor_size : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>8th Floor Max. size</label>
                                        <input type="number" name="eighth_floor_max_size" step="0.01" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->eighth_floor_max_size) ? $property->propertyDetails->eighth_floor_max_size : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>8th Floor Rooms</label>
                                        <input type="number" name="eighth_floor_rooms" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->eighth_floor_rooms) ? $property->propertyDetails->eighth_floor_rooms : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>8th Floor Baths</label>
                                        <input type="number" name="eighth_floor_baths" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->eighth_floor_baths) ? $property->propertyDetails->eighth_floor_baths : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>8th Floor Max.Price</label> <span class="text-danger">*</span>
                                        <input type="number" name="eighth_floor_price" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->eighth_floor_price) ? $property->propertyDetails->eighth_floor_price : '0.00'); ?>">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>8th Floor Min. Price</label> <span class="text-danger">*</span>
                                        <input type="number" name="eighth_floor_max_price" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->eighth_floor_max_price) ? $property->propertyDetails->eighth_floor_max_price : '0.00'); ?>">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12 mb-4">
                                            <div class="user-image mb-3 text-center">
                                                <img loading="lazy" src="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->eighth_floor_picture)); ?>" alt="" id="preview-image-before-upload">
                                            </div>

                                            <div class="form-group">
                                                <label for="">File:(image/slider)</label>
                                                <input type="file" name="eighth_floor_picture" class="form-control" id="photo-upload" value="<?php echo e($property->propertyDetails->eighth_floor_picture); ?>">
                                                <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>9th Floor Plans:</h5>
                        </div>
                        <div class="db-add-listing">
                            <div class="row mb-30">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>9th Floor Title</label>
                                        <input type="text" name="ninth_floor_title" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->ninth_floor_title) ? $property->propertyDetails->ninth_floor_title : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>9th Floor Sold</label>
                                    <select name="ninth_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select Option</option>
                                        <option value="1" <?php if(isset($property->propertyDetails->ninth_floor_sold)): ?> <?php echo e($property->propertyDetails->ninth_floor_sold == '1' ? 'selected' : ''); ?> <?php endif; ?>>No</option>
                                        <option value="2" <?php if(isset($property->propertyDetails->ninth_floor_sold)): ?> <?php echo e($property->propertyDetails->ninth_floor_sold == '2' ? 'selected' : ''); ?> <?php endif; ?>>Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>9th Floor Min. size</label>
                                        <input type="number" name="ninth_floor_size" step="0.01" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->ninth_floor_size) ? $property->propertyDetails->ninth_floor_size : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>9th Floor Max. size</label>
                                        <input type="number" name="ninth_floor_max_size" step="0.01" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->ninth_floor_max_size) ? $property->propertyDetails->ninth_floor_max_size : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>9th Floor Rooms</label>
                                        <input type="number" name="ninth_floor_rooms" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->ninth_floor_rooms) ? $property->propertyDetails->ninth_floor_rooms : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>9th Floor Baths</label>
                                        <input type="number" name="ninth_floor_baths" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->ninth_floor_baths) ? $property->propertyDetails->ninth_floor_baths : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>9th Floor Min. Price</label> <span class="text-danger">*</span>
                                        <input type="number" name="ninth_floor_price" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->ninth_floor_price) ? $property->propertyDetails->ninth_floor_price : '0.00'); ?>">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>9th Floor Max. Price</label> <span class="text-danger">*</span>
                                        <input type="number" name="ninth_floor_max_price" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->ninth_floor_max_price) ? $property->propertyDetails->ninth_floor_max_price : '0.00'); ?>">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12 mb-4">
                                            <div class="user-image mb-3 text-center">
                                                <img loading="lazy" src="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->ninth_floor_picture)); ?>" alt="" id="preview-image-before-upload">
                                            </div>

                                            <div class="form-group">
                                                <label for="">File:(image/slider)</label>
                                                <input type="file" name="ninth_floor_picture" class="form-control" id="photo-upload" value="<?php echo e($property->propertyDetails->ninth_floor_picture); ?>">
                                                <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>10th Floor Plans:</h5>
                        </div>
                        <div class="db-add-listing">
                            <div class="row mb-30">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>10th Floor Title</label>
                                        <input type="text" name="tenth_floor_title" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->tenth_floor_title) ? $property->propertyDetails->tenth_floor_title : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>10th Floor Sold</label>
                                    <select name="tenth_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select Option</option>
                                        <option value="1" <?php if(isset($property->propertyDetails->tenth_floor_sold)): ?> <?php echo e($property->propertyDetails->tenth_floor_sold == '1' ? 'selected' : ''); ?> <?php endif; ?>>No</option>
                                        <option value="2" <?php if(isset($property->propertyDetails->tenth_floor_sold)): ?> <?php echo e($property->propertyDetails->tenth_floor_sold == '2' ? 'selected' : ''); ?> <?php endif; ?>>Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>10th Floor Min. size</label>
                                        <input type="number" name="tenth_floor_size" step="0.01" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->tenth_floor_size) ? $property->propertyDetails->tenth_floor_size : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>10th Floor Max. size</label>
                                        <input type="number" name="tenth_floor_max_size" step="0.01" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->tenth_floor_max_size) ? $property->propertyDetails->tenth_floor_max_size : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>10th Floor Rooms</label>
                                        <input type="number" name="tenth_floor_rooms" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->tenth_floor_rooms) ? $property->propertyDetails->tenth_floor_rooms : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>10th Floor Baths</label>
                                        <input type="number" name="tenth_floor_baths" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->tenth_floor_baths) ? $property->propertyDetails->tenth_floor_baths : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>10th Floor Min. Price</label> <span class="text-danger">*</span>
                                        <input type="number" name="tenth_floor_price" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->tenth_floor_price) ? $property->propertyDetails->tenth_floor_price : '0.00'); ?>">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>10th Floor Max. Price</label> <span class="text-danger">*</span>
                                        <input type="number" name="tenth_floor_max_price" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->tenth_floor_max_price) ? $property->propertyDetails->tenth_floor_max_price : '0.00'); ?>">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12 mb-4">
                                            <div class="user-image mb-3 text-center">
                                                <img loading="lazy" src="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->tenth_floor_picture)); ?>" alt="" id="preview-image-before-upload">
                                            </div>

                                            <div class="form-group">
                                                <label for="">File:(image/slider)</label>
                                                <input type="file" name="tenth_floor_picture" class="form-control" id="photo-upload" value="<?php echo e($property->propertyDetails->tenth_floor_picture); ?>">
                                                <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>11th Floor Plans:</h5>
                        </div>
                        <div class="db-add-listing">
                            <div class="row mb-30">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>11th Floor Title</label>
                                        <input type="text" name="eleventh_floor_title" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->eleventh_floor_title) ? $property->propertyDetails->eleventh_floor_title : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>11th Floor Sold</label>
                                    <select name="eleventh_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select Option</option>
                                        <option value="1" <?php if(isset($property->propertyDetails->eleventh_floor_sold)): ?> <?php echo e($property->propertyDetails->eleventh_floor_sold == '1' ? 'selected' : ''); ?> <?php endif; ?>>No</option>
                                        <option value="2" <?php if(isset($property->propertyDetails->eleventh_floor_sold)): ?> <?php echo e($property->propertyDetails->eleventh_floor_sold == '2' ? 'selected' : ''); ?> <?php endif; ?>>Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>11th Floor Min. size</label>
                                        <input type="number" name="eleventh_floor_size" step="0.01" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->eleventh_floor_size) ? $property->propertyDetails->eleventh_floor_size : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>11th Floor Max. size</label>
                                        <input type="number" name="eleventh_floor_max_size" step="0.01" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->eleventh_floor_max_size) ? $property->propertyDetails->eleventh_floor_max_size : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>11th Floor Rooms</label>
                                        <input type="number" name="eleventh_floor_rooms" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->eleventh_floor_rooms) ? $property->propertyDetails->eleventh_floor_rooms : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>11th Floor Baths</label>
                                        <input type="number" name="eleventh_floor_baths" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->eleventh_floor_baths) ? $property->propertyDetails->eleventh_floor_baths : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>11th Floor Min. Price</label> <span class="text-danger">*</span>
                                        <input type="number" name="eleventh_floor_price" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->eleventh_floor_price) ? $property->propertyDetails->eleventh_floor_price : '0.00'); ?>">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>11th Floor Max. Price</label> <span class="text-danger">*</span>
                                        <input type="number" name="eleventh_floor_max_price" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->eleventh_floor_max_price) ? $property->propertyDetails->eleventh_floor_max_price : '0.00'); ?>">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12 mb-4">
                                            <div class="user-image mb-3 text-center">
                                                <img loading="lazy" src="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->eleventh_floor_picture)); ?>" alt="" id="preview-image-before-upload">
                                            </div>

                                            <div class="form-group">
                                                <label for="">File:(image/slider)</label>
                                                <input type="file" name="eleventh_floor_picture" class="form-control" id="photo-upload" value="<?php echo e($property->propertyDetails->eleventh_floor_picture); ?>">
                                                <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>12th Floor Plans:</h5>
                        </div>
                        <div class="db-add-listing">
                            <div class="row mb-30">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>12th Floor Title</label>
                                        <input type="text" name="twelfth_floor_title" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->twelfth_floor_title) ? $property->propertyDetails->twelfth_floor_title : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>12th Floor Sold</label>
                                    <select name="twelfth_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select Option</option>
                                        <option value="1" <?php if(isset($property->propertyDetails->twelfth_floor_sold)): ?> <?php echo e($property->propertyDetails->twelfth_floor_sold == '1' ? 'selected' : ''); ?> <?php endif; ?>>No</option>
                                        <option value="2" <?php if(isset($property->propertyDetails->twelfth_floor_sold)): ?> <?php echo e($property->propertyDetails->twelfth_floor_sold == '2' ? 'selected' : ''); ?> <?php endif; ?>>Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>12th Floor Min. size</label>
                                        <input type="number" name="twelfth_floor_size" step="0.01" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->twelfth_floor_size) ? $property->propertyDetails->twelfth_floor_size : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>12th Floor Max. size</label>
                                        <input type="number" name="twelfth_floor_max_size" step="0.01" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->twelfth_floor_max_size) ? $property->propertyDetails->twelfth_floor_max_size : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>12th Floor Rooms</label>
                                        <input type="number" name="twelfth_floor_rooms" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->twelfth_floor_rooms) ? $property->propertyDetails->twelfth_floor_rooms : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>12th Floor Baths</label>
                                        <input type="number" name="twelfth_floor_baths" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->twelfth_floor_baths) ? $property->propertyDetails->twelfth_floor_baths : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>12th Floor Min. Price</label> <span class="text-danger">*</span>
                                        <input type="number" name="twelfth_floor_price" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->twelfth_floor_price) ? $property->propertyDetails->twelfth_floor_price : '0.00'); ?>">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>12th Floor Max. Price</label> <span class="text-danger">*</span>
                                        <input type="number" name="twelfth_floor_max_price" class="form-control filter-input" value="<?php echo e(isset($property->propertyDetails->twelfth_floor_max_price) ? $property->propertyDetails->twelfth_floor_max_price : '0.00'); ?>">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12 mb-4">
                                            <div class="user-image mb-3 text-center">
                                                <img loading="lazy" src="<?php echo e(URL::asset('/images/floors/'.$property->propertyDetails->twelfth_floor_picture)); ?>" alt="" id="preview-image-before-upload">
                                            </div>

                                            <div class="form-group">
                                                <label for="">File:(image/slider)</label>
                                                <input type="file" name="twelfth_floor_picture" class="form-control" id="photo-upload" value="<?php echo e($property->propertyDetails->twelfth_floor_picture); ?>">
                                                <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
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
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    tinymce.init({
      selector: '#content',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount code',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat | code ',
    });
  </script>

<script>
        tinymce.init({
            selector: '#location_info', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>



<script>
    $(document).on('change', '#category_id', function() {
        var propertyType = $(this).val();
        // alert(propertyType);
        if (propertyType == 1 || propertyType == 4) {
            $("#property").show();
            $("#land").hide();
            $("#project").hide();
        } else {
            $("#property").hide();
        }
    });
</script>
<script>
    $(document).on('change', '#category_id', function() {
        var propertyType = $(this).val();
        // alert(propertyType);
        if (propertyType == 5) {
            $("#property").hide();
            $("#land").hide();
            $("#project").show();
        } else {
            $("#project").hide();
        }
    });
</script>

<script>
    $(document).on('change','#country',function(){
        var country = $(this).val();
        $.ajax({
            method:'post',
            url: '<?php echo e(route('admin.get.state')); ?>',
            data: {country:country,"_token":"<?php echo e(csrf_token()); ?>"},
            dataType:'html',
            success:function(response){
                $('#state').html(response);
                $('#state').selectpicker('refresh');
            }
        });
    });
</script>

<script>
    $(document).on('change','#state',function(){
        var state = $(this).val();
        $.ajax({
            method:'post',
            url: '<?php echo e(route('admin.get.city')); ?>',
            data: {state:state,"_token":"<?php echo e(csrf_token()); ?>"},
            dataType:'html',
            success:function(response){
                $('#city').html(response);
                $('#city').selectpicker('refresh');
            }
        });
    });
</script>
<script>
    $(document).on('change','#category_id',function(){
        var propertyType = $(this).val();
        // alert(propertyType);
        if(propertyType == 1)
        {
            $("#bed").show();
            $("#bath").show();
        }else{
            $("#bed").hide();
            $("#bath").hide();
        }
    });
    </script>
<script>
    (function($) {
        "use strict";
        // Multiple images preview with JavaScript

        $('#photo-upload').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#preview-image-before-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('.old-image').click(function(){

            var image = $(this).attr("data-id");
            var id = $(this).attr("data-property");
            // alert(key);
            $.ajax({
                url: "<?php echo e(route('admin.destroy.galleryImage')); ?>",
                method: "GET",
                data: {id:id,image:image},
                success: function (data) {
                    // alert(data);
                    alert(data);
                    location.reload();
                    // if (data =='success') {
                    //     window.location.href = "English";
                    // }
                }
            })
            $(this).parent().parent().remove();

        });
    })(jQuery);
</script>
<script >
    $(function() {
// Multiple images preview with JavaScript
        var previewImages = function(input, imgPreviewPlaceholder) {
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
            previewImages(this, 'div.images-preview-div');
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/admin/properties/edit.blade.php ENDPATH**/ ?>