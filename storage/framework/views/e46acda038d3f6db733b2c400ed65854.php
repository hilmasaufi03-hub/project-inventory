<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Stok Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            
            <!-- Judul & Tombol Tambah -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold text-dark">📦 Sistem Manajemen Inventaris</h2>
                <a href="<?php echo e(route('inventaris.create')); ?>" class="btn btn-primary">＋ Tambah Barang Baru</a>
            </div>

            <!-- Form Pencarian Data -->
            <form action="<?php echo e(route('inventaris.index')); ?>" method="GET" class="mb-4 d-flex gap-2">
                <input type="text" name="search" class="form-control" placeholder="Cari nama barang..." value="<?php echo e(request('search')); ?>">
                <button type="submit" class="btn btn-secondary px-4">Cari</button>
            </form>

            <!-- Notifikasi Sukses -->
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <!-- Tabel Data Barang -->
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th style="width: 15%;">Stok</th>
                            <th style="width: 25%;">Harga Satuan</th>
                            <th style="width: 15%;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $stokBarang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="fw-semibold"><?php echo e($item->name); ?></td>
                            <td>
                                <span class="badge bg-info text-dark"><?php echo e($item->category->name ?? 'Tanpa Kategori'); ?></span>
                            </td>
                            <td><?php echo e($item->stock); ?> Pcs</td>
                            <td>Rp <?php echo e(number_format($item->price, 0, ',', '.')); ?></td>
                            <td class="text-center">
                                <a href="<?php echo e(route('inventaris.edit', $item->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <form action="<?php echo e(route('inventaris.destroy', $item->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">Belum ada data inventaris yang tersimpan.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Navigasi Halaman (Pagination) -->
            <div class="mt-3">
                <?php echo e($stokBarang->links()); ?>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\Users\user\Downloads\project-inventory\resources\views/products/index.blade.php ENDPATH**/ ?>