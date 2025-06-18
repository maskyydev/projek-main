<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<h2 class="text-xl font-bold mb-4"><?= $title; ?></h2>

<div class="card p-4 max-w-xl mx-auto shadow-sm border rounded-lg">
    <form action="<?= base_url('lembaga/save'); ?>" method="post">
        <input type="hidden" name="id_lemb" value="<?= $lembaga['id_lemb'] ?? ''; ?>">

        <div class="form-group mb-3">
            <label for="nama_lembaga" class="form-label">Nama Lembaga</label>
            <input type="text" name="nama_lembaga" id="nama_lembaga" class="form-control" required value="<?= $lembaga['nama_lembaga'] ?? ''; ?>">
        </div>

        <div class="form-group pt-2">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="<?= base_url('lembaga'); ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>
