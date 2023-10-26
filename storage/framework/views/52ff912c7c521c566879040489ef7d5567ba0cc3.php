

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Manage Feed Backs</h2>
    <?php if(session('status')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(session('status')); ?>

    </div>
    <?php endif; ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Description</th>
                <th>Created By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($data) && $data->count()): ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($value->title); ?></td>
                <td><?php echo e($value->category); ?></td>
                <td><?php echo e($value->description); ?></td>
                <td><?php echo e($value->user->name); ?></td>
                <td><a href="<?php echo e(route('delete-feed-back', $value->id)); ?>">delete</a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr>
                <td colspan="5">No data found</td>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\interview tasks\commenting_app\resources\views/admin/feed_back.blade.php ENDPATH**/ ?>