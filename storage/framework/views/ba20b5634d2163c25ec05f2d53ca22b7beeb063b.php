<?php $__env->startSection('content'); ?>
    <div class="dash-content">
        <div class="container-fluid">
            <div class="act-title d-flex justify-content-between">
                <h5>Properties</h5><br>
                </div>
                    <div class="act-title d-flex justify-content-end">
                        <a href="<?php echo e(route('admin.properties.create')); ?>" class="btn v3">Add Property</a>
                        <a href="<?php echo e(route('admin.import-view')); ?>" class="btn v3" style="margin-left: 10px;">Import Property</a>
                    </div>

                <div class="invoice-body">

                </div>
                <div class="table-responsive">
                        <table class="invoice-table table" id="propertis_table">
                            <thead>
                            <tr class="invoice-headings">
                                <th style="max-width:105px">Action</th>
                                <th>User</th>
                                <th>Title</th>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th style="max-width:100px">Status</th>
                                <th>Moderation Status</th>
                                <th>Is Featured</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    (function($){
        "use strict";
        $('#propertis_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax:{
                url: "<?php echo e(route('admin.properties.index')); ?>"
            },
            columns:[
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
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
                    data: 'property_id',
                    name: 'property_id'
                },
                {
                    data: 'category',
                    name: 'category'
                },
                {
                    data: 'type',
                    name: 'type'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action1',
                    name: 'action1'
                },
                {
                    data: 'featured',
                    name: 'featured'
                }

            ]
        });
    })(jQuery);
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/admin/properties/index.blade.php ENDPATH**/ ?>