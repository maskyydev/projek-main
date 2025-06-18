<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<h2 class="text-xl font-bold mb-4"><?= esc($title); ?></h2>

<div class="card p-4 max-w-2xl mx-auto shadow-sm border rounded-lg">
    <form method="post" action="<?= isset($capaian) ? base_url('capaian/update') : base_url('capaian/create') ?>">
        <?php if (isset($capaian)): ?>
            <input type="hidden" name="id_capaian" value="<?= esc($capaian['id_capaian']) ?>">
        <?php endif; ?>

        <!-- Standar -->
        <div class="form-group mb-3">
            <label for="id_standar" class="form-label">Standar</label>
            <select name="id_standar" id="id_standar" class="form-control" required>
                <?php foreach ($standar as $s): ?>
                    <option value="<?= $s['id_standar'] ?>" <?= (isset($capaian) && $capaian['id_standar'] == $s['id_standar']) ? 'selected' : '' ?>>
                        <?= esc($s['nama_standar']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Prodi -->
        <div class="form-group mb-3">
            <label for="id_prodi" class="form-label">Prodi</label>
            <select name="id_prodi" id="id_prodi" class="form-control" required>
                <?php foreach ($prodi as $p): ?>
                    <option value="<?= $p['id_prodi'] ?>" <?= (isset($capaian) && $capaian['id_prodi'] == $p['id_prodi']) ? 'selected' : '' ?>>
                        <?= esc($p['nama_prodi']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Deskripsi -->
        <div class="form-group mb-3">
            <label for="deskripsi_capaian" class="form-label">Deskripsi Capaian</label>
            <textarea name="deskripsi_capaian" id="deskripsi_capaian" rows="3" class="form-control" required><?= isset($capaian) ? esc($capaian['deskripsi_capaian']) : '' ?></textarea>
        </div>

        <!-- Tahun -->
        <div class="form-group mb-4">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="text" name="tahun" id="tahun" maxlength="4" class="form-control" required value="<?= isset($capaian) ? esc($capaian['tahun']) : '' ?>">
        </div>

        <!-- Tombol Aksi -->
        <div class="form-group pt-2">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="<?= base_url('capaian'); ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>
