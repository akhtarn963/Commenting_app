

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Manage Comments</h2>
    <?php if(session('status')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(session('status')); ?>

    </div>
    <?php endif; ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Comment</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($data) && $data->count()): ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($value->name); ?></td>
                <td><?php echo e($value->comment); ?></td>
                <td><?php echo e($value->status); ?></td>
                <td><select name="status" data-url="<?php echo e(url('/admin')); ?>" data-id="<?php echo e($value->id); ?>"
                        data-token="<?php echo e(csrf_token()); ?>">
                        <option value="Y" <?php if($value->status == 'Y'): ?> selected="selected"<?php endif; ?>>Active</option>
                        <option value="N" <?php if($value->status == 'N'): ?> selected="selected"<?php endif; ?>>Inactive</option>
                    </select></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr>
                <td colspan="3">No data found</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <?php echo $data->links(); ?>

        </div>
    </div>
</div>

<script type="text/javascript">
$('select').on('change', function() {
    var status = $(this).val();
    var token = $(this).data('token');
    var base_url = $(this).data('url');
    var id = $(this).data('id');
    $.ajax({
        url: base_url + '/update_status',
        type: 'POST',
        data: {
            _token: token,
            status: status,
            id: id
        },
        success: function(msg) {
            //alert("success");
            location.reload();
        }
    });


})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\interview tasks\commenting_app\resources\views/admin/comment.blade.php ENDPATH**/ ?>