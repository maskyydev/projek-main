<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold"><?= $title; ?> List</h1>
    <a href="#" id="createLembagaBtn" data-url="<?= base_url('lembaga/form'); ?>" class="btn btn-primary">
        + Tambah Lembaga
    </a>
</div>

<?php if (session()->getFlashdata('notif_success')) : ?>
    <div class="mb-4 p-3 rounded bg-green-100 text-green-700">
        <?= session()->getFlashdata('notif_success'); ?>
    </div>
<?php endif; ?>

<div class="card shadow-sm rounded-lg border border-gray-200">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th style="width: 5%;">ID</th>
                        <th>Nama Lembaga</th>
                        <th style="width: 20%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($lembaga)) : ?>
                        <tr>
                            <td colspan="3" class="text-center text-muted">Tidak ada data lembaga.</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($lembaga as $row): ?>
                            <tr>
                                <td class="text-center"><?= $row['id_lemb']; ?></td>
                                <td><?= esc($row['nama_lembaga']); ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('lembaga/form/' . $row['id_lemb']); ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="<?= base_url('lembaga/delete/' . $row['id_lemb']); ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- SweetAlert2 untuk konfirmasi tambah -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('createLembagaBtn').addEventListener('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Tambah Lembaga Baru?',
            text: 'Apakah Anda yakin ingin menambahkan data lembaga baru?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = this.dataset.url;
            }
        });
    });
</script>

<?= $this->endSection(); ?>
