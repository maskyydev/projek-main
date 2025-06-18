<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<h2 class="text-2xl font-semibold mb-6"><?= $title; ?></h2>

<div class="card shadow-sm rounded-lg border border-gray-200 p-6 max-w-xl mx-auto">
    <form action="<?= base_url('prodi/save'); ?>" method="post" class="space-y-5">
        <input type="hidden" name="id_prodi" value="<?= $prodi['id_prodi'] ?? ''; ?>">

        <div class="form-group">
            <label for="nama_prodi" class="form-label font-medium">Nama Prodi</label>
            <input
                type="text"
                name="nama_prodi"
                id="nama_prodi"
                class="form-control mt-1"
                required
                value="<?= $prodi['nama_prodi'] ?? ''; ?>"
                placeholder="Masukkan nama program studi"
            >
        </div>

        <div class="form-group pt-3 flex gap-3">
            <button type="submit" class="btn btn-success px-4 py-2">
                <i class="bi bi-save"></i> Simpan
            </button>
            <a href="<?= base_url('prodi'); ?>" class="btn btn-secondary px-4 py-2">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>
