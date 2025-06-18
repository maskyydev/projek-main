<?= $this->include('common/header') ?>
<div class="p-4">
    <h1 class="text-2xl font-bold mb-4"><?= esc($title) ?></h1>

    <?php if (session()->getFlashdata('notif_success')): ?>
        <div class="bg-green-100 text-green-700 p-2 rounded mb-2">
            <?= session()->getFlashdata('notif_success') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('notif_error')): ?>
        <div class="bg-red-100 text-red-700 p-2 rounded mb-2">
            <?= session()->getFlashdata('notif_error') ?>
        </div>
    <?php endif; ?>

    <a href="<?= base_url('Dosen/form') ?>" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Dosen</a>

    <table class="w-full border mt-4">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">NIDN</th>
                <th class="p-2 border">NIY</th>
                <th class="p-2 border">Nama Lengkap</th>
                <th class="p-2 border">Alamat</th>
                <th class="p-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Dosen as $d): ?>
                <tr class="border">
                    <td class="p-2 border"><?= esc($d['nidn']) ?></td>
                    <td class="p-2 border"><?= esc($d['niy']) ?></td>
                    <td class="p-2 border"><?= esc($d['nama_lengkap']) ?></td>
                    <td class="p-2 border"><?= esc($d['alamat']) ?></td>
                    <td class="p-2 border">
                        <!-- Tambahkan tombol edit jika ada -->
                        <a href="<?= base_url('Dosen/deleteDosen/' . $d['id_dosen']) ?>" onclick="return confirm('Yakin hapus?')" class="text-red-600">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->include('common/footer') ?>
