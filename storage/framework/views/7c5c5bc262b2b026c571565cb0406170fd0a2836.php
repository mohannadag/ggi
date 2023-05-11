<?php $__env->startPush('styles'); ?>
<style>
    .imgPreview img {
        padding: 8px;
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
            <form action="<?php echo e(route('admin.citizenship.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="citizenship_id" id="citizenship_id" value="1">
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
                                        <input type="text" name="title" class="form-control filter-input" value="<?php echo e($citizenship->citizenshipTranslation->title); ?>" placeholder="Page Title">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Banner Text</label> <span class="text-danger">*</span>
                                        <textarea name="banner_text" class="form-control filter-input" value="<?php echo e($citizenship->citizenshipTranslation->banner_text); ?>" placeholder="Banner Text"> </textarea>
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
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Main Button Text</label> <span class="text-danger">*</span>
                                        <input type="text" name="title" class="form-control filter-input" value="<?php echo e($citizenship->citizenshipTranslation->main_button_text); ?>" placeholder="Page Title">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Main Button Link</label> <span class="text-danger">*</span>
                                        <textarea name="banner_text" class="form-control filter-input" value="<?php echo e($citizenship->citizenshipTranslation->main_button_link); ?>" placeholder="Banner Text"> </textarea>
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
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Extra Button Text</label> <span class="text-danger">*</span>
                                        <input type="text" name="title" class="form-control filter-input" value="<?php echo e($citizenship->citizenshipTranslation->extra_button_text); ?>" placeholder="Page Title">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Extra Button Link</label> <span class="text-danger">*</span>
                                        <textarea name="banner_text" class="form-control filter-input" value="<?php echo e($citizenship->citizenshipTranslation->extra_button_link); ?>" placeholder="Banner Text"> </textarea>
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
                            </div>

                            <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" class="form-control" name="file" id="file">
                                            <?php $__errorArgs = ['image'];
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Overview Title</label> <span class="text-danger">*</span>
                                        <input type="text" name="overview_title" class="form-control filter-input" value="<?php echo e($citizenship->citizenshipTranslation->overview_title); ?>" placeholder="Page Title">
                                        <?php $__errorArgs = ['overview_title'];
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
                                        <label for="list_info">Overview Description</label> <span class="text-danger">*</span>
                                        <textarea name="overview_desc" class="form-control tinymce" id="content" rows="4" placeholder="Enter your text here"><?php echo $citizenship->citizenshipTranslation->overview_desc ?? $citizenship->citizenshipTranslationEnglish->overview_desc  ?? null; ?></textarea>
                                        <?php $__errorArgs = ['overview_desc'];
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

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Overview First Title</label> <span class="text-danger">*</span>
                                        <input type="text" name="overview_first_title" class="form-control filter-input" value="<?php echo e($citizenship->citizenshipTranslation->overview_first_title); ?>" placeholder="Page Title">
                                        <?php $__errorArgs = ['overview_first_title'];
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
                                        <label for="list_info">Overview First Description</label> <span class="text-danger">*</span>
                                        <textarea name="overview_first_desc" class="form-control tinymce" id="content" rows="4" placeholder="Enter your text here"><?php echo $citizenship->citizenshipTranslation->overview_first_desc ?? $citizenship->citizenshipTranslationEnglish->overview_first_desc  ?? null; ?></textarea>
                                        <?php $__errorArgs = ['overview_first_desc'];
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Overview Second Title</label> <span class="text-danger">*</span>
                                        <input type="text" name="overview_second_title" class="form-control filter-input" value="<?php echo e($citizenship->citizenshipTranslation->overview_second_title); ?>" placeholder="Page Title">
                                        <?php $__errorArgs = ['overview_second_title'];
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
                                        <label for="list_info">Overview Second Description</label> <span class="text-danger">*</span>
                                        <textarea name="overview_first_desc" class="form-control tinymce" id="content" rows="4" placeholder="Enter your text here"><?php echo $citizenship->citizenshipTranslation->overview_second_desc ?? $citizenship->citizenshipTranslationEnglish->overview_second_desc  ?? null; ?></textarea>
                                        <?php $__errorArgs = ['overview_second_desc'];
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Overview Third Title</label> <span class="text-danger">*</span>
                                        <input type="text" name="overview_third_title" class="form-control filter-input" value="<?php echo e($citizenship->citizenshipTranslation->overview_third_title); ?>" placeholder="Page Title">
                                        <?php $__errorArgs = ['overview_third_title'];
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
                                        <label for="list_info">Overview Third Description</label> <span class="text-danger">*</span>
                                        <textarea name="overview_third_desc" class="form-control tinymce" id="content" rows="4" placeholder="Enter your text here"><?php echo $citizenship->citizenshipTranslation->overview_third_desc ?? $citizenship->citizenshipTranslationEnglish->overview_third_desc  ?? null; ?></textarea>
                                        <?php $__errorArgs = ['overview_third_desc'];
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

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Field Title</label> <span class="text-danger">*</span>
                                        <input type="text" name="obtaining_title" class="form-control filter-input" value="<?php echo e($citizenship->citizenshipTranslation->obtaining_title); ?>" placeholder="Page Title">
                                        <?php $__errorArgs = ['obtaining_title'];
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
                                        <label for="list_info">First Field Content</label> <span class="text-danger">*</span>
                                        <textarea name="obtaining_text" class="form-control tinymce" id="content" rows="4" placeholder="Enter your text here"><?php echo $citizenship->citizenshipTranslation->obtaining_text ?? $citizenship->citizenshipTranslationEnglish->obtaining_text  ?? null; ?></textarea>
                                        <?php $__errorArgs = ['obtaining_text'];
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Second Field Title</label> <span class="text-danger">*</span>
                                        <input type="text" name="acquisition_title" class="form-control filter-input" value="<?php echo e($citizenship->citizenshipTranslation->acquisition_title); ?>" placeholder="Page Title">
                                        <?php $__errorArgs = ['acquisition_title'];
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
                                        <label for="list_info">Second Field Content</label> <span class="text-danger">*</span>
                                        <textarea name="acquisition_text" class="form-control tinymce" id="content" rows="4" placeholder="Enter your text here"><?php echo $citizenship->citizenshipTranslation->acquisition_text ?? $citizenship->citizenshipTranslationEnglish->acquisition_text  ?? null; ?></textarea>
                                        <?php $__errorArgs = ['acquisition_text'];
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Third Field Title</label> <span class="text-danger">*</span>
                                        <input type="text" name="documents_title" class="form-control filter-input" value="<?php echo e($citizenship->citizenshipTranslation->documents_title); ?>" placeholder="Page Title">
                                        <?php $__errorArgs = ['documents_title'];
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
                                        <label for="list_info">Third Field Content</label> <span class="text-danger">*</span>
                                        <textarea name="documents_text" class="form-control tinymce" id="content" rows="4" placeholder="Enter your text here"><?php echo $citizenship->citizenshipTranslation->documents_text ?? $citizenship->citizenshipTranslationEnglish->documents_text  ?? null; ?></textarea>
                                        <?php $__errorArgs = ['documents_text'];
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fourth Field Title</label> <span class="text-danger">*</span>
                                        <input type="text" name="stages_title" class="form-control filter-input" value="<?php echo e($citizenship->citizenshipTranslation->stages_title); ?>" placeholder="Page Title">
                                        <?php $__errorArgs = ['stages_title'];
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
                                        <label for="list_info">Fourth Field Content</label> <span class="text-danger">*</span>
                                        <textarea name="stages_text" class="form-control tinymce" id="content" rows="4" placeholder="Enter your text here"><?php echo $citizenship->citizenshipTranslation->stages_text ?? $citizenship->citizenshipTranslationEnglish->stages_text  ?? null; ?></textarea>
                                        <?php $__errorArgs = ['stages_text'];
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/admin/citizenship/create.blade.php ENDPATH**/ ?>