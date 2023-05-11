<?php $__env->startSection('content'); ?>
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Edit Blog:</h5>
                        </div>
                        <div class="db-add-listing">
                            <form action="<?php echo e(route('admin.blogs.update',$blog)); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <input type="hidden" name="locale" value="<?php echo e($locale); ?>">
                                <div class="row">
                                    <input type="hidden" name="user_id" value="<?php echo e($blog->user_id); ?>">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Moderation Status</label>
                                            <select class="listing-input hero__form-input form-control custom-select" name="status">
                                                <option value="">Select</option>
                                                <option value="pending" <?php echo e($blog->status == 'pending' ? 'selected' : ''); ?>>PENDING</option>
                                                <option value="approved" <?php echo e($blog->status == 'approved' ? 'selected' : ''); ?>>APPROVED</option>
                                                <option value="rejected" <?php echo e($blog->status == 'rejected' ? 'selected' : ''); ?>>REJECTED</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="listing-input hero__form-input form-control custom-select" name="category_id">
                                                <option value="">Select</option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->id); ?>" <?php echo e($category->id == $blog->category_id ? 'selected' : ''); ?>><?php echo e($category->blogCategoryTranslation->name ?? $category->blogCategoryTranslationEnglish->name  ?? null); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Title:</label> <span class="text-danger">*</span>
                                            <input type="text" name="title" <?php if(isset($blogTranslation->title)): ?> value="<?php echo e($blogTranslation->title); ?>" <?php else: ?> value="" <?php endif; ?> class="form-control filter-input" id="title" placeholder="Name">
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
                                            <label>Slug:</label> <span class="text-danger">*</span>
                                            <input type="text" name="slug"  <?php if(isset($blogTranslation->slug)): ?> value="<?php echo e($blogTranslation->slug); ?>" <?php else: ?> value="" <?php endif; ?> class="form-control filter-input" id="slug" placeholder="/slug">
                                            <?php $__errorArgs = ['slug'];
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
                                            <label>Tag:</label> <span class="text-danger">*</span>
                                            <select name="tags[]" id="" class="form-control" multiple>
                                                <option value="">Select</option>
                                                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($tag->id); ?>"
                                                    <?php $__currentLoopData = $blog->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo e($t->id == $tag->id ? 'selected' : ''); ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    ><?php echo e($tag->tagTranslation->name ?? $tag->tagTranslationEnglish->name  ?? null); ?></option>
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
                                    <div class="col-md-6">

                                        <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="image" id="photo-upload">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="user-image mb-3 text-center">
                                            <img loading="lazy" src="<?php echo e(URL::asset('/images/thumbnail/'.$blog->image)); ?>" alt="" id="preview-image-before-upload" style="width: 350px;height: 254px;">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="body">Content</label> <span class="text-danger">*</span>
                                            <textarea name="body" class="form-control" id="body" rows="4" placeholder="Enter your text here"><?php echo $blog->blogTranslation->body ?? $blog->blogTranslationEnglish->body  ?? null; ?></textarea>
                                            <?php $__errorArgs = ['body'];
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
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>

<script>
    tinymce.init({
      selector: '#body',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount code',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat | code ',
    });
  </script>
<!--<script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>-->
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/admin/blogs/edit.blade.php ENDPATH**/ ?>