<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <link href="https://jsdelivr.net" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold text-dark">📦 Inventory Management System</h2>
                <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary fw-semibold">+ Tambah Produk</a>
            </div>

            <!-- Form Pencarian -->
            <form action="<?php echo e(route('products.index')); ?>" method="GET" class="mb-3 d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari nama produk..." value="<?php echo e(request('search')); ?>">
                <button type="submit" class="btn btn-secondary px-4">Cari</button>
            </form>

            <!-- Notifikasi Berhasil -->
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <!-- Tabel Data -->
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th style="width: 15%;">Stok</th>
                            <th style="width: 25%;">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="fw-semibold"><?php echo e($product->name); ?></td>
                            <td><span class="badge bg-info text-dark"><?php echo e($product->category->name ?? 'Tanpa Kategori'); ?></span></td>
                            <td><?php echo e($product->stock); ?> Pcs</td>
                            <td>Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted fs-5">📭 Belum ada data produk di inventory.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-3">
                <?php echo e($products->links()); ?>

            </div>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\Hype AMD\Documents\inventory-app\resources\views/products/index.blade.php ENDPATH**/ ?>