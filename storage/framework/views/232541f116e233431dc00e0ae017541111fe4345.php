

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Manage Users</h2>
    <?php if(session('status')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(session('status')); ?>

    </div>
    <?php endif; ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($users) && $users->count()): ?>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($value->name); ?></td>
                <td><?php echo e($value->email); ?></td>
                <td><a href="<?php echo e(route('delete-user', $value->id)); ?>">delete</a></td>
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
            <?php echo $users->links(); ?>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\interview tasks\commenting_app\resources\views/admin/users.blade.php ENDPATH**/ ?>