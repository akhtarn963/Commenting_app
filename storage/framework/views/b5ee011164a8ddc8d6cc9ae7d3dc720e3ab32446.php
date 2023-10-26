

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Feed Back Detail')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                    <?php endif; ?>

                    <!-- Feed back lisitng -->
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12 col-lg-12">
                            <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                                <div class="card-body p-4">
                                    <?php if(!empty($data) && $data->count()): ?>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h4 style="width:90%;float:left"><?php echo e($value->title); ?></h4>
                                        </div>
                                        <div class="card-body">
                                            <?php echo $value->description; ?>

                                            <p>Category: <?php echo e($value->category); ?></p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                    <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp"
                                                        alt="avatar" width="25" height="25" /> -->
                                                    <p class="small mb-0 ms-2">Created By: <?php echo e($value->user->name); ?></p>
                                                </div>
                                                <div class="d-flex flex-row align-items-center">
                                                    <p class="small text-muted mb-0">Upvote?</p>
                                                    <i class="far fa-thumbs-up mx-2 fa-xs text-black"
                                                        style="margin-top: -0.16rem;"></i>
                                                    <p class="small text-muted mb-0">4</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <p>No data found</p>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end -->
                </div>
            </div>

        </div>
        <div class="col-md-8 mt-3">
            <h1>Comments</h1>
            <section style="">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12 col-lg-10 col-xl-12">
                            <?php if(!empty($comments) && $comments->count()): ?>
                            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-start align-items-center">
                                        <div>
                                            <h6 class="fw-bold text-primary mb-1"><?php echo e($value->name); ?></h6>
                                            <p class="text-muted small mb-0">
                                                <?php echo e($value->created_at); ?>

                                            </p>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-4 pb-2">
                                        <?php echo $value->comment; ?>

                                    </p>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <div class="card mb-4">
                                <div class="card-body">
                                    <p>No data found</p>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container mt-5">
                <div class="d-flex justify-content-center">
                    <?php echo $comments->links(); ?>

                </div>
            </div>
        </div>

        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header"><?php echo e(__('Leave a Comment')); ?></div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('add-comment')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row mb-3">
                            <label for="name" class="col-md-2 col-form-label text-md"><?php echo e(__('Name')); ?></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>

                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="password" class="col-md-4 col-form-label text-md"><?php echo e(__('Comment')); ?></label>
                            <div class="col-md-12">
                                <textarea id="comment"
                                    class="ckeditor form-control <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="comment"
                                    required autocomplete="comment"></textarea>

                                <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="hidden" name="feed_back_id"
                                    value="<?php echo e((!empty($data) && $data->count()) ?$data[0]->id : 0); ?>" />
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Add Comment')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin">
</script>
<script>
tinymce.init({
    selector: "#comment",
    plugins: "emoticons",
    toolbar: "emoticons",
    toolbar_location: "bottom",
    menubar: false
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\interview tasks\commenting_app\resources\views/feedbackdetail.blade.php ENDPATH**/ ?>