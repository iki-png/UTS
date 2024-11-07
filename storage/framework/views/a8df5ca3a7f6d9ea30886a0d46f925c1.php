

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar Mahasiswa</div>

                <div class="card-body">
                    <!-- Tombol Tambah Data -->
                    <div class="mb-3">
                        <a href="<?php echo e(route('students.create')); ?>" class="btn btn-sm btn-success">
                            <i class="fas fa-plus"></i> Tambah Data
                        </a>
                    </div>
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($s->nim); ?></td>
                                <td><?php echo e($s->name); ?></td>
                                <td><?php echo e($s->tempat_lahir); ?></td>
                                <td><?php echo e(\Carbon\Carbon::parse($s->tanggal_lahir)->format('d-m-Y')); ?></td>
                                <td>
                                    <a href="<?php echo e(route('students.edit', $s->id)); ?>" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <!-- Form Delete -->
                                    <form action="<?php echo e(route('students.destroy', $s->id)); ?>" method="POST" style="display:inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash"></i> delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($students->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Home\b-unival\unival-a2\resources\views/Student/index.blade.php ENDPATH**/ ?>