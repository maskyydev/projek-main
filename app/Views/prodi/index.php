<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold"><?= $title; ?> List</h1>
    <a href="#" id="createProdiBtn" data-url="<?= base_url('prodi/form'); ?>" class="btn btn-primary">
        + Tambah Prodi
    </a>
</div>

<div class="card shadow-sm rounded-lg border border-gray-200">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th style="width: 5%;">ID</th>
                        <th>Nama Prodi</th>
                        <th style="width: 20%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($prodi)) : ?>
                        <tr>
                            <td colspan="3" class="text-center text-muted">Tidak ada data Prodi.</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($prodi as $row): ?>
                            <tr>
                                <td class="text-center"><?= $row['id_prodi']; ?></td>
                                <td><?= esc($row['nama_prodi']); ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('prodi/form/' . $row['id_prodi']); ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="<?= base_url('prodi/delete/' . $row['id_prodi']); ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- SweetAlert untuk konfirmasi -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('createProdiBtn').addEventListener('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Tambah Prodi Baru?',
            text: 'Apakah Anda yakin ingin menambahkan data Prodi baru?',
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
