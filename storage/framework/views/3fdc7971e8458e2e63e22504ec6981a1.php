

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- Menampilkan Nama Mahasiswa di Header -->
                <div class="card-header">
                    <?php echo e(__('Edit Student: ') . $student->name); ?>

                </div>

                <div class="card-body">
                    <!-- Form Edit Student -->
                    <form action="<?php echo e(route('student.update', $student->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?> <!-- Method PUT digunakan untuk update -->

                        <!-- Input Nama -->
                        <div class="form-group mb-3">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo e($student->name); ?>" required>
                        </div>
                        
                        <!-- Input NIM -->
                        <div class="form-group mb-3">
                            <label for="nim">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim" value="<?php echo e($student->nim); ?>" required>
                        </div>
                        
                        <!-- Input Kelas -->
                        <div class="form-group mb-3">
                            <label for="kelas">Kelas</label>
                            <input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo e($student->kelas); ?>" required>
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Data Berhasil diedit')">
                            <?php echo e(__('Update')); ?>

                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\unival-a2\resources\views/Student/edit.blade.php ENDPATH**/ ?>