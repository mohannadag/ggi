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
                <form action="<?php echo e(route('admin.properties.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="col-md-12">

                        <div class="db-add-list-wrap">
                            <div class="act-title">
                                <h5>Property Information :</h5>
                                <h6>Fields in this section are mandatory</h6>
                            </div>
                            <div class="db-add-listing">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
                                        <input type="hidden" name="moderation_status" value="2">
                                        <input type="hidden" name="status" value="1">
                                        <input type="hidden" name="package_id" value="55">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Property Title</label> <span class="text-danger">*</span>
                                            <input type="text" name="title" class="form-control filter-input"
                                                value="<?php echo e(old('title')); ?>" placeholder="Property Title">
                                            <?php $__errorArgs = ['title'];
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
                                        <label>Property ID</label> <span class="text-danger">*</span>
                                        <input type="text" name="property_id" class="form-control filter-input"
                                            value="<?php echo e(old('property_id')); ?>" placeholder="Enter Property ID">
                                        <?php $__errorArgs = ['property_id'];
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Is Featured</label><br>
                                            <input id="is_featured" type="checkbox" name="is_featured" checked data-toggle="toggle"
                                                data-on="yes" data-off="no" data-onstyle="success"
                                                data-offstyle="danger">
                                            <?php $__errorArgs = ['is_featured'];
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
                                        <label>Property Type</label> <span class="text-danger">*</span>
                                        <select name="type"
                                            class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select</option>
                                            <option value="<?php echo e('sale'); ?>" <?php echo e(old('type') == 'sale' ? 'selected' : ''); ?>>Sale</option>
                                            <option value="<?php echo e('rent'); ?>" <?php echo e(old('type') == 'rent' ? 'selected' : ''); ?>>Rent</option>
                                        </select>
                                        <?php $__errorArgs = ['type'];
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
                                    <div class="col-md-4">
                                        <label>Suitable for Citizenship?</label> <span class="text-danger">*</span>
                                        <select name="citizenship"
                                            class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select</option>
                                            <option value="<?php echo e('1'); ?>" <?php echo e(old('citizenship') == '1' ? 'selected' : ''); ?>>Yes</option>
                                            <option value="<?php echo e('2'); ?>" <?php echo e(old('citizenship') == '2' ? 'selected' : ''); ?>>No</option>
                                        </select>
                                        <?php $__errorArgs = ['type'];
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tag:</label> <span class="text-danger">*</span>
                                            <select name="tag" id="tag" class="form-control">
                                                <option value="">Select</option>
                                                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></option>
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
                                        <label>Category</label> <span class="text-danger">*</span>
                                        <select name="category_id" id="category_id" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select</option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->category_id); ?>" <?php echo e(old('category_id') == $category->category_id ? 'selected' : ''); ?>> <?php echo e($category->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['category_id'];
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Country:</label> <span class="text-danger">*</span>
                                            <select name="country_id"
                                                class="listing-input hero__form-input  form-control custom-select"
                                                id="country">
                                                <option value="">Select</option>
                                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($country->country_id); ?>" <?php echo e(old('country_id') == $country->country_id ? 'selected' : ''); ?>><?php echo e($country->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['country_id'];
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
                                            <label>State</label> <span class="text-danger">*</span>
                                            <select name="state_id" class="listing-input hero__form-input  form-control custom-select" id="state">
                                            </select>
                                            <?php $__errorArgs = ['state_id'];
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
                                            <label>City</label> <span class="text-danger">*</span>
                                            <select name="city_id"
                                                class="listing-input hero__form-input  form-control custom-select"
                                                id="city">
                                            </select>
                                            <?php $__errorArgs = ['city_id'];
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Property Price</label> <span class="text-danger">*</span>
                                            <input type="text" name="price" class="form-control filter-input"
                                                value="<?php echo e(old('price')); ?>" placeholder="$1500">
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Currency</label> <span class="text-danger">*</span>
                                            <select name="currency_id"
                                                class="listing-input hero__form-input  form-control custom-select">
                                                <option value="">Select</option>
                                                <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($currency->id); ?>"><?php echo e($currency->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                            </select>
                                            <?php $__errorArgs = ['currency_id'];
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
                                            <label>Listing Size in Sq M2</label>
                                            <input type="text" name="room_size" class="form-control filter-input"
                                                value="<?php echo e(old('room_size')); ?>" placeholder="Enter Size in numbers">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-30">
                                        <div class="form-group">
                                            <label>Property Video Link</label>
                                            <input type="text" name="video" class="form-control filter-input"
                                                placeholder="Video Link Here" value="<?php echo e(old('video')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-30">
                                        <div class="form-group">
                                            <label>Drive Link</label>
                                            <input type="text" name="drive_link" class="form-control filter-input"
                                                placeholder="Google Link Here" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-30">
                                        <div class="form-group">
                                            <label>Floor Plans Link</label>
                                            <input type="text" name="plans_link" class="form-control filter-input"
                                                placeholder="Floor Plans Link Here" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-30">
                                        <div class="form-group">
                                            <label>Word Link</label>
                                            <input type="text" name="word_link" class="form-control filter-input"
                                                placeholder="Word Link Here" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-30">
                                        <div class="form-group">
                                            <label>Prices Link</label>
                                            <input type="text" name="prices_link" class="form-control filter-input"
                                                placeholder="Prices Link Here" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-30">
                                        <div class="form-group">
                                            <label>Whatsapp Link</label>
                                            <input type="text" name="whatsapp_link" class="form-control filter-input"
                                                placeholder="Whatsapp Link Here" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-30">
                                        <div class="form-group">
                                            <label>Presentation Link</label>
                                            <input type="text" name="presentation" class="form-control filter-input"
                                                placeholder="Presentation Link Here" value="<?php echo e(old('link')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-30">
                                        <div class="form-group">
                                            <label>IVR Link</label>
                                            <input type="text" name="ivr" class="form-control filter-input"
                                                placeholder="Virtual Reality Link Here" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-30">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" name="address" class="form-control filter-input"
                                                placeholder="address" value="<?php echo e(old('address')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="list_info">Description</label> <span class="text-danger">*</span>
                                            <textarea name="description" class="form-control" id="list_info" rows="4" placeholder="Enter your text here"><?php echo old('description'); ?></textarea>
                                            <?php $__errorArgs = ['description'];
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
                                            <label for="list_info">Content</label> <span class="text-danger">*</span>
                                            <textarea name="content" class="form-control tinymce" id="content" rows="4"
                                                placeholder="Enter your text here"><?php echo old('content'); ?></textarea>
                                            <?php $__errorArgs = ['content'];
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
                                            <label for="list_info">Location Info</label> <span class="text-danger">*</span>
                                            <textarea name="location_info" class="form-control tinymce" id="location_info" rows="4"
                                                placeholder="Enter your text here"><?php echo old('location_info'); ?></textarea>
                                            <?php $__errorArgs = ['location_info'];
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
                                            <label>Facilities</label>
                                            <div>
                                                <?php $__currentLoopData = $facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <input id="check-a" type="checkbox" name="facility_id[]" value="<?php echo e($facility->facility_id); ?>">
                                                    <label for="check-a"><?php echo e($facility->name); ?></label>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="db-add-list-wrap">


                                        <div class="db-add-listing">
                                            <div class="row">
                                                <div class="col-md-12 mb-4">
                                                    <div class="user-image mb-3 text-center">
                                                        <img loading="lazy" src="" alt=""
                                                            id="preview-image-before-upload">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Thumbnail Image</label> <span
                                                            class="text-danger">*</span>
                                                        <input type="file" name="thumbnail" class="form-control"
                                                            id="photo-upload">
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
                                                    
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="mt-1 text-center">
                                                            <div class="images-preview-div"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <div class="add-listing__input-file-box">
                                                                <input class="add-listing__input-file" type="file"
                                                                    name="images[]" multiple="multiple" id="images">
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
                                </div>
                            </div>
                        </div>
                        <div class="db-add-list-wrap" id="property">
                            <div class="act-title">
                                <h5>Property Details :</h5>
                            </div>
                            <div class="db-add-listing">
                                <div class="row mb-30">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Number of Bath</label>
                                            <input type="number" name="bath" class="form-control filter-input"
                                                value="<?php echo e(old('bath')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Number of Garages</label>
                                            <input type="number" name="garage" class="form-control filter-input"
                                                value="<?php echo e(old('garage')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Select Floor</label>
                                        <input type="number" name="floor" class="form-control filter-input"
                                            value="<?php echo e(old('floor')); ?>">
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Inside Project</label>
                                        <select name="inside_project"
                                            class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select Option</option>
                                            <option value="1" <?php echo e(old('inside_project') == 1 ? 'selected' : ''); ?>>No</option>
                                            <option value="2" <?php echo e(old('inside_project') == 2 ? 'selected' : ''); ?>>Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Cash Option</label>
                                        <select name="cash" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select Option</option>
                                            <option value="1" <?php echo e(old('cash') == 1 ? 'selected' : ''); ?>>No</option>
                                            <option value="2" <?php echo e(old('cash') == 2 ? 'selected' : ''); ?>>Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Installment Option</label>
                                        <select name="installments"
                                            class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select Option</option>
                                            <option value="1" <?php echo e(old('installments') == 1 ? 'selected' : ''); ?>>No</option>
                                            <option value="2" <?php echo e(old('installments') == 2 ? 'selected' : ''); ?>>Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Building Age</label>
                                            <input type="number" name="building_age" class="form-control filter-input"
                                                value="<?php echo e(old('building_age')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Apartment Status</label>
                                        <select name="emptiness" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select Option</option>
                                            <option value="1">Empty</option>
                                            <option value="2">Occupied</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Balcony</label>
                                        <select name="balcony" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select Option</option>
                                            <option value="1">No</option>
                                            <option value="2">Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Exchangable</label>
                                        <select name="convertability"
                                            class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select Option</option>
                                            <option value="1">No</option>
                                            <option value="2">Yes</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="db-add-list-wrap" id="project">
                            <div class="act-title">
                                <h5>Project Details:</h5>
                            </div>
                            <div class="db-add-listing">
                                <div class="row mb-30">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Number of Blocks</label>
                                            <input type="number" name="blocks" class="form-control filter-input"
                                                value="<?php echo e(old('blocks')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Units Count</label>
                                        <input type="number" name="total_units" class="form-control filter-input"
                                            value="<?php echo e(old('total_units')); ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Units Per Floor</label>
                                            <input type="number" name="units_infloors" class="form-control filter-input"
                                                value="<?php echo e(old('units_infloors')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Delivery Month</label>
                                            <input type="number" name="delivery_month" class="form-control filter-input"
                                                value="<?php echo e(old('delivery_month')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Delivery Years</label>
                                            <input type="number" name="deliver_year" class="form-control filter-input" value="<?php echo e(old('deliver_year')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>View</label>
                                            <select name="view" class="listing-input hero__form-input  form-control custom-select">
                                                <option value=""><?php echo e(trans('file.na')); ?></option>
                                                <option value="<?php echo e('1'); ?>" <?php echo e(old('view') == '1' ? 'selected' : ''); ?>><?php echo e(trans('file.na')); ?></option>
                                                <option value="<?php echo e('2'); ?>" <?php echo e(old('view') == '2' ? 'selected' : ''); ?>> <?php echo e(trans('file.view_sea')); ?></option>
                                                <option value="<?php echo e('3'); ?>" <?php echo e(old('view') == '3' ? 'selected' : ''); ?>> <?php echo e(trans('file.view_forest')); ?></option>
                                                <option value="<?php echo e('4'); ?>" <?php echo e(old('view') == '4' ? 'selected' : ''); ?>> <?php echo e(trans('file.view_street')); ?></option>
                                                <option value="<?php echo e('5'); ?>" <?php echo e(old('view') == '5' ? 'selected' : ''); ?>> <?php echo e(trans('file.view_landscape')); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Maintenance Fees</label>
                                            <input type="number" name="maintenance_fee" class="form-control filter-input" value="<?php echo e(old('maintenance_fee')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Social Facilities Size</label>
                                            <input type="number" name="landscape" class="form-control filter-input" value="<?php echo e(old('landscape')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Heating System</label>
                                        <select name="heating" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select Option</option>
                                            <option value="<?php echo e('1'); ?>" <?php echo e(old('heating') == '1' ? 'selected' : ''); ?>><?php echo e(trans('file.na')); ?> </option>
                                            <option value="<?php echo e('2'); ?>" <?php echo e(old('heating') == '2' ? 'selected' : ''); ?>> <?php echo e(trans('file.central_heating')); ?></option>
                                            <option value="<?php echo e('3'); ?>" <?php echo e(old('heating') == '3' ? 'selected' : ''); ?>> <?php echo e(trans('file.natural_gas')); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Title Deed Type</label>
                                        <select name="title_deed_type" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select Option</option>
                                            <option value="<?php echo e('1'); ?>" <?php echo e(old('title_deed_type') == '1' ? 'selected' : ''); ?>> Ready</option>
                                            <option value="<?php echo e('2'); ?>" <?php echo e(old('title_deed_type') == '2' ? 'selected' : ''); ?>> Under Construction</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Mortgage</label>
                                        <select name="creditability" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select Option</option>
                                            <option value="<?php echo e('1'); ?>" <?php echo e(old('creditability') == '1' ? 'selected' : ''); ?>>No</option>
                                            <option value="<?php echo e('2'); ?>" <?php echo e(old('creditability') == '2' ? 'selected' : ''); ?>>Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Units Types</label>
                                        <select name="bed" class="listing-input hero__form-input  form-control custom-select" multiple>
                                                    <option value=""><?php echo e(trans('file.na')); ?></option>
                                                    <option value="[1]" >1+0</option>
                                                    <option value="[2]" >1+1</option>
                                                    <option value="[3]" >2+1</option>
                                                    <option value="[4]" >3+1</option>
                                                    <option value="[5]" >4+1</option>
                                                    <option value="[6]" >5+1</option>
                                                    <option value="[7]" >6+1</option>
                                                    <option value="[8]" >7+1</option>
                                                    <option value="[9]" >8+1</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="db-add-list-wrap" id="land">
                            <div class="act-title">
                                <h5>Land Details:</h5>
                            </div>
                            <div class="db-add-listing">
                                <div class="row mb-30">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Island No</label>
                                            <input type="number" name="island_no" class="form-control filter-input" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Sheet No</label>
                                            <input type="number" name="sheet_no" class="form-control filter-input"
                                                value="<?php echo e(old('sheet_no')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Precedent Value</label>
                                            <input type="number" name="precedent_value"
                                                class="form-control filter-input" value="<?php echo e(old('precedent_value')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Gauge</label>
                                            <input type="number" name="gauge" class="form-control filter-input"
                                                value="<?php echo e(old('gauge')); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Parcel Number</label>
                                            <input type="number" name="parcel" class="form-control filter-input"
                                                value="<?php echo e(old('parcels')); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Title Deed Type</label>
                                        <select name="title_deed_type"
                                            class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select Option</option>
                                            <option value="<?php echo e('1'); ?>"
                                                <?php echo e(old('title_deed_type') == '1' ? 'selected' : ''); ?>>
                                                <?php echo e(trans('file.condominium')); ?></option>
                                            <option value="<?php echo e('2'); ?>"
                                                <?php echo e(old('title_deed_type') == '2' ? 'selected' : ''); ?>>
                                                <?php echo e(trans('file.easement')); ?></option>
                                            <option value="<?php echo e('3'); ?>"
                                                <?php echo e(old('title_deed_type') == '3' ? 'selected' : ''); ?>>
                                                <?php echo e(trans('file.shared')); ?></option>
                                        </select>
                                    </div>



                                </div>
                            </div>
                        </div>

                        <div class="db-add-list-wrap">
                            <div class="act-title">
                                <h5>1st Floor Plans:</h5>
                            </div>
                            <div class="db-add-listing">
                                <div class="row mb-30">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>1st Floor Title</label>
                                            <input type="text" name="first_floor_title"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('first_floor_title')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>1st Floor Sold?</label>
                                        <select name="first_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select Option</option>
                                            <option value="1">No</option>
                                            <option value="2">Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>1st Floor Min. size</label>
                                            <input type="number" name="first_floor_size" step="0.01"
                                                class="form-control filter-input" value="<?php echo e(old('first_floor_size')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>1st Floor Max. size</label>
                                            <input type="number" name="first_floor_max_size" step="0.01"
                                                class="form-control filter-input" value="<?php echo e(old('first_floor_max_size')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>1st Floor Rooms</label>
                                            <input type="number" name="first_floor_rooms"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('first_floor_rooms')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>1st Floor Baths</label>
                                            <input type="number" name="first_floor_baths"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('first_floor_baths')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>1st Floor Price</label> <span class="text-danger">*</span>
                                            <input type="number" name="first_floor_price"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('first_floor_price')); ?>">
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
                                            <input type="number" name="first_floor_max_price"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('first_floor_max_price')); ?>">
                                            <?php $__errorArgs = ['first_floor_max_price'];
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
                                                    <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">1st Floor Image:(image/video)</label>
                                                    <input type="file" name="first_floor_picture" class="form-control" id="photo-upload">
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
                                            <input type="text" name="second_floor_title"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('second_floor_title')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>2nd Floor Sold?</label>
                                        <select name="second_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select Option</option>
                                            <option value="1">No</option>
                                            <option value="2">Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>2nd Floor size</label>
                                            <input type="number" name="second_floor_size" step="0.01"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('second_floor_size')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>2nd Floor Max. size</label>
                                            <input type="number" name="second_floor_max_size" step="0.01"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('second_floor_max_size')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>2nd Floor Rooms</label>
                                            <input type="number" name="second_floor_rooms"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('second_floor_rooms')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>2nd Floor Baths</label>
                                            <input type="number" name="second_floor_baths"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('second_floor_baths')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>2nd Floor Min. Price</label> <span class="text-danger">*</span>
                                            <input type="number" name="second_floor_price"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('second_floor_price')); ?>">
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
                                    </div><div class="col-md-4">
                                        <div class="form-group">
                                            <label>2nd Floor Max. Price</label> <span class="text-danger">*</span>
                                            <input type="number" name="second_floor_max_price"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('second_floor_max_price')); ?>">
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
                                                    <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">2nd Floor Image:(image/video)</label>
                                                    <input type="file" name="second_floor_picture" class="form-control" id="photo-upload">
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
                                <h5>3rd Floor Plan:</h5>
                            </div>
                            <div class="db-add-listing">
                                <div class="row mb-30">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>3rd Floor Title</label>
                                            <input type="text" name="third_floor_title"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('third_floor_title')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>3rd Floor Sold?</label>
                                        <select name="third_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select Option</option>
                                            <option value="1">No</option>
                                            <option value="2">Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>3rd Floor Min. size</label>
                                            <input type="number" name="third_floor_size" step="0.01"
                                                class="form-control filter-input" value="<?php echo e(old('third_floor_size')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>3rd Floor Max. size</label>
                                            <input type="number" name="third_floor_max_size" step="0.01"
                                                class="form-control filter-input" value="<?php echo e(old('third_floor_max_size')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>3rd Floor Rooms</label>
                                            <input type="number" name="third_floor_rooms"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('third_floor_rooms')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>3rd Floor Baths</label>
                                            <input type="number" name="third_floor_baths"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('third_floor_baths')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>3rd Floor Min. Price</label> <span class="text-danger">*</span>
                                            <input type="number" name="third_floor_price"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('third_floor_price')); ?>">
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
                                            <input type="number" name="third_floor_max_price"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('third_floor_max_price')); ?>">
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
                                                    <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">3rd Floor Image:(image/video)</label>
                                                    <input type="file" name="third_floor_picture" class="form-control" id="photo-upload">
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
                                <h5>4th Floor Plan:</h5>
                            </div>
                            <div class="db-add-listing">
                                <div class="row mb-30">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>4th Floor Title</label>
                                            <input type="text" name="fourth_floor_title"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('fourth_floor_title')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>4th Floor Sold?</label>
                                        <select name="fourth_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select Option</option>
                                            <option value="1">No</option>
                                            <option value="2">Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>4th Floor Min. size</label>
                                            <input type="number" name="fourth_floor_size" step="0.01"
                                                class="form-control filter-input" value="<?php echo e(old('fourth_floor_size')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>4th Floor Max. size</label>
                                            <input type="number" name="fourth_floor_max_size" step="0.01"
                                                class="form-control filter-input" value="<?php echo e(old('fourth_floor_max_size')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>4th Floor Rooms</label>
                                            <input type="number" name="fourth_floor_rooms"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('fourth_floor_rooms')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>4th Floor Baths</label>
                                            <input type="number" name="fourth_floor_baths"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('fourth_floor_baths')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>4th Floor Min. Price</label> <span class="text-danger">*</span>
                                            <input type="number" name="fourth_floor_price"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('fourth_floor_price')); ?>">
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
                                            <input type="number" name="fourth_floor_max_price"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('fourth_floor_max_price')); ?>">
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
                                                    <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">4th Floor Image:(image/video)</label>
                                                    <input type="file" name="fourth_floor_picture" class="form-control" id="photo-upload">
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
                                <h5>5th Floor Plan:</h5>
                            </div>
                            <div class="db-add-listing">
                                <div class="row mb-30">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>5th Floor Title</label>
                                            <input type="text" name="fifth_floor_title"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('fifth_floor_title')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>6th Floor Sold?</label>
                                        <select name="fifth_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select Option</option>
                                            <option value="1">No</option>
                                            <option value="2">Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>5th Floor Min. size</label>
                                            <input type="number" name="fifth_floor_size" step="0.01"
                                                class="form-control filter-input" value="<?php echo e(old('fifth_floor_size')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>5th Floor Max. size</label>
                                            <input type="number" name="fifth_floor_max_size" step="0.01"
                                                class="form-control filter-input" value="<?php echo e(old('fifth_floor_max_size')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>5th Floor Rooms</label>
                                            <input type="number" name="fifth_floor_rooms"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('fifth_floor_rooms')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>5th Floor Baths</label>
                                            <input type="number" name="fifth_floor_baths"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('fifth_floor_baths')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>5th Floor Price</label> <span class="text-danger">*</span>
                                            <input type="number" name="fifth_floor_price"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('fifth_floor_price')); ?>">
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
                                                    <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">5th Floor Image:(image/video)</label>
                                                    <input type="file" name="fifth_floor_picture" class="form-control" id="photo-upload">
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
                                <h5>6th Floor Plan:</h5>
                            </div>
                            <div class="db-add-listing">
                                <div class="row mb-30">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>6th Floor Title</label>
                                            <input type="text" name="sixth_floor_title"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('sixth_floor_title')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>6th Floor Sold?</label>
                                        <select name="sixth_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select Option</option>
                                            <option value="1">No</option>
                                            <option value="2">Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>6th Floor Min. size</label>
                                            <input type="number" name="sixth_floor_size" step="0.01"
                                                class="form-control filter-input" value="<?php echo e(old('sixth_floor_size')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>6th Floor Max. size</label>
                                            <input type="number" name="sixth_floor_max_size" step="0.01"
                                                class="form-control filter-input" value="<?php echo e(old('sixth_floor_max_size')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>6th Floor Rooms</label>
                                            <input type="number" name="sixth_floor_rooms"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('sixth_floor_rooms')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>6th Floor Baths</label>
                                            <input type="number" name="sixth_floor_baths"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('sixth_floor_baths')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>6th Floor Max. Price</label> <span class="text-danger">*</span>
                                            <input type="number" name="sixth_floor_price"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('sixth_floor_price')); ?>">
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
                                            <input type="number" name="sixth_floor_max_price"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('sixth_floor_max_price')); ?>">
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
                                                    <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">6th Floor Image:(image/video)</label>
                                                    <input type="file" name="sixth_floor_picture" class="form-control" id="photo-upload">
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
                                <h5>7th Floor Plan:</h5>
                            </div>
                            <div class="db-add-listing">
                                <div class="row mb-30">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>7th Floor Title</label>
                                            <input type="text" name="seventh_floor_title"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('seventh_floor_title')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>7th Floor Sold?</label>
                                        <select name="seventh_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select Option</option>
                                            <option value="1">No</option>
                                            <option value="2">Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>7th Floor Min. size</label>
                                            <input type="number" name="seventh_floor_size" step="0.01"
                                                class="form-control filter-input" value="<?php echo e(old('seventh_floor_size')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>7th Floor Max. size</label>
                                            <input type="number" name="seventh_floor_max_size" step="0.01"
                                                class="form-control filter-input" value="<?php echo e(old('seventh_floor_max_size')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>7th Floor Rooms</label>
                                            <input type="number" name="seventh_floor_rooms"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('seventh_floor_rooms')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>7th Floor Baths</label>
                                            <input type="number" name="seventh_floor_baths"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('seventh_floor_baths')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>7th Floor Min. Price</label> <span class="text-danger">*</span>
                                            <input type="number" name="seventh_floor_price"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('seventh_floor_price')); ?>">
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
                                            <label>7th Floor Min. Price</label> <span class="text-danger">*</span>
                                            <input type="number" name="seventh_floor_max_price"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('seventh_floor_max_price')); ?>">
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
                                                    <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">7th Floor Image:(image/video)</label>
                                                    <input type="file" name="seventh_floor_picture" class="form-control" id="photo-upload">
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
                                <h5>8th Floor Plan:</h5>
                            </div>
                            <div class="db-add-listing">
                                <div class="row mb-30">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>8th Floor Title</label>
                                            <input type="text" name="eighth_floor_title"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('eighth_floor_title')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>8th Floor Sold?</label>
                                        <select name="eighth_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select Option</option>
                                            <option value="1">No</option>
                                            <option value="2">Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>8th Floor Min. size</label>
                                            <input type="number" name="eighth_floor_size" step="0.01"
                                                class="form-control filter-input" value="<?php echo e(old('eighth_floor_size')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>8th Floor Max. size</label>
                                            <input type="number" name="eighth_floor_max_size" step="0.01"
                                                class="form-control filter-input" value="<?php echo e(old('eighth_floor_max_size')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>8th Floor Rooms</label>
                                            <input type="number" name="eighth_floor_rooms"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('eighth_floor_rooms')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>8th Floor Baths</label>
                                            <input type="number" name="eighth_floor_baths"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('eighth_floor_baths')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>8th Floor Min. Price</label> <span class="text-danger">*</span>
                                            <input type="number" name="eighth_floor_price"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('eighth_floor_price')); ?>">
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
                                            <label>8th Floor Max. Price</label> <span class="text-danger">*</span>
                                            <input type="number" name="eighth_floor_max_price"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('eighth_floor_max_price')); ?>">
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
                                                    <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">8th Floor Image:(image/video)</label>
                                                    <input type="file" name="eighth_floor_picture" class="form-control" id="photo-upload">
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
                                <h5>9th Floor Plan:</h5>
                            </div>
                            <div class="db-add-listing">
                                <div class="row mb-30">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>9th Floor Title</label>
                                            <input type="text" name="ninth_floor_title"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('ninth_floor_title')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>9th Floor Sold?</label>
                                        <select name="ninth_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select Option</option>
                                            <option value="1">No</option>
                                            <option value="2">Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>9th Floor Min. size</label>
                                            <input type="number" name="ninth_floor_size" step="0.01"
                                                class="form-control filter-input" value="<?php echo e(old('ninth_floor_size')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>9th Floor Max. size</label>
                                            <input type="number" name="ninth_floor_max_size" step="0.01"
                                                class="form-control filter-input" value="<?php echo e(old('ninth_floor_max_size')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>9th Floor Rooms</label>
                                            <input type="number" name="ninth_floor_rooms"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('ninth_floor_rooms')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>9th Floor Baths</label>
                                            <input type="number" name="ninth_floor_baths"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('ninth_floor_baths')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>9th Floor Min. Price</label> <span class="text-danger">*</span>
                                            <input type="number" name="ninth_floor_price"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('ninth_floor_price')); ?>">
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
                                            <input type="number" name="ninth_floor_max_price"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('ninth_floor_max_price')); ?>">
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
                                                    <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">9th Floor Image:(image/video)</label>
                                                    <input type="file" name="ninth_floor_picture" class="form-control" id="photo-upload">
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
                                <h5>10th Floor Plan:</h5>
                            </div>
                            <div class="db-add-listing">
                                <div class="row mb-30">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>10th Floor Title</label>
                                            <input type="text" name="tenth_floor_title"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('tenth_floor_title')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>10th Floor Sold?</label>
                                        <select name="tenth_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select Option</option>
                                            <option value="1">No</option>
                                            <option value="2">Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>10th Floor Min. size</label>
                                            <input type="number" name="tenth_floor_size" step="0.01"
                                                class="form-control filter-input" value="<?php echo e(old('tenth_floor_size')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>10th Floor Max. size</label>
                                            <input type="number" name="tenth_floor_max_size" step="0.01"
                                                class="form-control filter-input" value="<?php echo e(old('tenth_floor_max_size')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>10th Floor Rooms</label>
                                            <input type="number" name="tenth_floor_rooms"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('tenth_floor_rooms')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>10th Floor Baths</label>
                                            <input type="number" name="tenth_floor_baths"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('tenth_floor_baths')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>10th Floor Min. Price</label> <span class="text-danger">*</span>
                                            <input type="number" name="tenth_floor_price"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('tenth_floor_price')); ?>">
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
                                            <input type="number" name="tenth_floor_max_price"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('tenth_floor_max_price')); ?>">
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
                                                    <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">10th Floor Image:(image/video)</label>
                                                    <input type="file" name="tenth_floor_picture" class="form-control" id="photo-upload">
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
                                <h5>11th Floor Plan:</h5>
                            </div>
                            <div class="db-add-listing">
                                <div class="row mb-30">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>11th Floor Title</label>
                                            <input type="text" name="eleventh_floor_title"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('eleventh_floor_title')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>11th Floor Sold?</label>
                                        <select name="eleventh_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select Option</option>
                                            <option value="1">No</option>
                                            <option value="2">Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>11th Floor Min. size</label>
                                            <input type="number" name="eleventh_floor_size" step="0.01"
                                                class="form-control filter-input" value="<?php echo e(old('eleventh_floor_size')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>11th Floor Max. size</label>
                                            <input type="number" name="eleventh_floor_max_size" step="0.01"
                                                class="form-control filter-input" value="<?php echo e(old('eleventh_floor_max_size')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>11th Floor Rooms</label>
                                            <input type="number" name="eleventh_floor_rooms"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('eleventh_floor_rooms')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>11th Floor Baths</label>
                                            <input type="number" name="eleventh_floor_baths"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('eleventh_floor_baths')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>11th Floor Min. Price</label> <span class="text-danger">*</span>
                                            <input type="number" name="eleventh_floor_price"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('eleventh_floor_price')); ?>">
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
                                            <input type="number" name="eleventh_floor_max_price"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('eleventh_floor_max_price')); ?>">
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
                                                    <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">11th Floor Image:(image/video)</label>
                                                    <input type="file" name="eleventh_floor_picture" class="form-control" id="photo-upload">
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
                                <h5>12th Floor Plan:</h5>
                            </div>
                            <div class="db-add-listing">
                                <div class="row mb-30">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>12th Floor Title</label>
                                            <input type="text" name="twelfth_floor_title"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('twelfth_floor_title')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>12th Floor Sold?</label>
                                        <select name="twelfth_floor_sold" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select Option</option>
                                            <option value="1">No</option>
                                            <option value="2">Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>12th Floor Min. size</label>
                                            <input type="number" name="twelfth_floor_size" step="0.01"
                                                class="form-control filter-input" value="<?php echo e(old('twelfth_floor_size')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>12th Floor Max. size</label>
                                            <input type="number" name="twelfth_floor_max_size" step="0.01"
                                                class="form-control filter-input" value="<?php echo e(old('twelfth_floor_max_size')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>12th Floor Rooms</label>
                                            <input type="number" name="twelfth_floor_rooms"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('twelfth_floor_rooms')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>12th Floor Baths</label>
                                            <input type="number" name="twelfth_floor_baths"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('twelfth_floor_baths')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>12th Floor Min. Price</label> <span class="text-danger">*</span>
                                            <input type="number" name="twelfth_floor_price"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('twelfth_floor_price')); ?>">
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
                                            <input type="number" name="twelfth_floor_max_price"
                                                class="form-control filter-input"
                                                value="<?php echo e(old('twelfth_floor_max_price')); ?>">
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
                                                    <img loading="lazy" src="" alt="" id="preview-image-before-upload">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">12th Floor Image:(image/video)</label>
                                                    <input type="file" name="twelfth_floor_picture" class="form-control" id="photo-upload">
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
            selector: '#content', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
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
        $(document).on('change', '#country', function() {
            var country = $(this).val();
            $.ajax({
                method: 'post',
                url: '<?php echo e(route('admin.get.state')); ?>',
                data: {
                    country: country,
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                dataType: 'html',
                success: function(response) {
                    $('#state').html(response);
                    $('#state').selectpicker('refresh');
                }
            });
        });
    </script>

    <script>
        $(document).on('change', '#state', function() {
            var state = $(this).val();
            $.ajax({
                method: 'post',
                url: '<?php echo e(route('admin.get.city')); ?>',
                data: {
                    state: state,
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                dataType: 'html',
                success: function(response) {
                    $('#city').html(response);
                    $('#city').selectpicker('refresh');
                }
            });
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
        (function($) {
            "use strict";
            // Multiple images preview with JavaScript
            //        var multiImgPreview = function(input, imgPreviewPlaceholder) {
            //
            //            if (input.files) {
            //                var filesAmount = input.files.length;
            //                for (i = 0; i < filesAmount; i++) {
            //                    var reader = new FileReader();
            //                    reader.onload = function(event) {
            //                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
            //                    }
            //                    reader.readAsDataURL(input.files[i]);
            //                }
            //            }
            //        };

            //        $('#images').on('change', function() {
            //            multiImgPreview(this, 'div.imgPreview');
            //        });
            $('#photo-upload').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

        })(jQuery);
    </script>
    <script>
        $(function() {
            // Multiple images preview with JavaScript
            var previewImages = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#images').on('change', function() {
                previewImages(this, 'div.images-preview-div');
            });
        });

        $('#is_featured').prop('checked', false);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/admin/properties/create.blade.php ENDPATH**/ ?>