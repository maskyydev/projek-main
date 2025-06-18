<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<h2 class="text-2xl font-semibold mb-6"><?= esc($title); ?></h2>

<div class="card shadow-sm rounded-lg border border-gray-200 p-6 max-w-xl mx-auto">
    <form action="<?= isset($standar['id_standar']) ? base_url('standar/save/' . $standar['id_standar']) : base_url('standar/save'); ?>" method="post" class="space-y-5">
        <input type="hidden" name="id_standar" value="<?= esc($standar['id_standar'] ?? ''); ?>">

        <!-- Lembaga -->
        <div class="form-group">
            <label for="id_lemb" class="form-label font-medium">Lembaga</label>
            <select name="id_lemb" id="id_lemb" class="form-control mt-1" required>
                <option value="">Pilih Lembaga</option>
                <?php foreach ($lembaga as $lem): ?>
                    <option value="<?= esc($lem['id_lemb']); ?>" <?= isset($standar['id_lemb']) && $standar['id_lemb'] == $lem['id_lemb'] ? 'selected' : ''; ?>>
                        <?= esc($lem['nama_lembaga']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Kode Standar -->
        <div class="form-group">
            <label for="kode_standar" class="form-label font-medium">Kode Standar</label>
            <input
                type="text"
                name="kode_standar"
                id="kode_standar"
                class="form-control mt-1"
                required
                value="<?= esc($standar['kode_standar'] ?? ''); ?>"
                placeholder="Masukkan kode standar"
            >
        </div>

        <!-- Nama Standar -->
        <div class="form-group">
            <label for="nama_standar" class="form-label font-medium">Nama Standar</label>
            <input
                type="text"
                name="nama_standar"
                id="nama_standar"
                class="form-control mt-1"
                required
                value="<?= esc($standar['nama_standar'] ?? ''); ?>"
                placeholder="Masukkan nama standar"
            >
        </div>

        <!-- Deskripsi -->
        <div class="form-group">
            <label for="deskripsi" class="form-label font-medium">Deskripsi</label>
            <textarea
                name="deskripsi"
                id="deskripsi"
                rows="4"
                class="form-control mt-1"
                placeholder="Tuliskan deskripsi standar"
            ><?= esc($standar['deskripsi'] ?? ''); ?></textarea>
        </div>

        <!-- Tombol -->
        <div class="form-group pt-3 flex gap-3">
            <button type="submit" class="btn btn-success px-4 py-2">
                <i class="bi bi-save"></i> Simpan
            </button>
            <a href="<?= base_url('standar'); ?>" class="btn btn-secondary px-4 py-2">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>
