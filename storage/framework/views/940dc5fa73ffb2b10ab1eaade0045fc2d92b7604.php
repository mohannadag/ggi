<?php $__env->startSection('content'); ?>
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">
                        <div class="act-title d-flex justify-content-between">
                            <h5>Blogs</h5><br>

                            <a href="<?php echo e(route('admin.blogs.create')); ?>" class="btn v3">Add New Blog</a>
                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table" id="package_table">
                                    <thead>
                                    <tr class="invoice-headings">
                                        <th style="max-width:100px">Action</th>
                                        <th>Category</th>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th style="max-width:100px">Status</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    (function($){
        "use strict";
        $('#package_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax:{
                url: "<?php echo e(route('admin.blogs.index')); ?>"
            },
            columns:[
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
                {
                    data: 'category',
                    name: 'category'
                },
                {
                    data: 'user',
                    name: 'user'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'action1',
                    name: 'action1'
                }
            ]
        });
    })(jQuery);
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/admin/blogs/index.blade.php ENDPATH**/ ?>