<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Barang - Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm p-4">
                    
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-bold text-dark">✏️ Form Edit Barang</h3>
                        <a href="<?php echo e(route('inventaris.index')); ?>" class="btn btn-secondary btn-sm">Kembali</a>
                    </div>

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('inventaris.update', $product->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Nama Produk</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name', $product->name)); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label fw-semibold">Kategori</label>
                            <select class="form-select" id="category_id" name="category_id" required>
                                <option value="" disabled>Pilih Kategori Barang</option>
                                <?php $__currentLoopData = $kategoriList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($kategori->id); ?>" <?php echo e(old('category_id', $product->category_id) == $kategori->id ? 'selected' : ''); ?>>
                                        <?php echo e($kategori->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="stock" class="form-label fw-semibold">Jumlah Stok</label>
                            <input type="number" class="form-control" id="stock" name="stock" value="<?php echo e(old('stock', $product->stock)); ?>" required>
                        </div>

                        <div class="mb-4">
                            <label for="price" class="form-label fw-semibold">Harga Satuan (Rp)</label>
                            <input type="number" class="form-control" id="price" name="price" value="<?php echo e(old('price', $product->price)); ?>" required>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-success px-4">Perbarui Data</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\Users\user\Downloads\project-inventory\resources\views/products/edit.blade.php ENDPATH**/ ?>