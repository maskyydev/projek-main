<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold"><?= esc($title); ?></h1>
    <a href="<?= base_url('standar/form'); ?>" class="btn btn-primary">+ Tambah Standar</a>
</div>

<div class="card shadow-sm rounded-lg border border-gray-200">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th width="5%">ID</th>
                        <th>Kode</th>
                        <th>Nama Standar</th>
                        <th>Lembaga</th>
                        <th>Deskripsi</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($standar)) : ?>
                        <tr>
                            <td colspan="6" class="text-center text-gray-500 italic">Belum ada data standar.</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($standar as $row): ?>
                            <tr>
                                <td class="text-center"><?= esc($row['id_standar']); ?></td>
                                <td><?= esc($row['kode_standar']); ?></td>
                                <td><?= esc($row['nama_standar']); ?></td>
                                <td><?= esc($row['nama_lembaga']); ?></td>
                                <td><?= esc($row['deskripsi']); ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('standar/form/' . $row['id_standar']); ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="<?= base_url('standar/delete/' . $row['id_standar']); ?>" onclick="return confirm('Hapus data ini?')" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
