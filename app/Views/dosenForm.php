<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<h1 class="h3 mb-3"><strong><?= $title; ?></strong> Form Menu </h1>

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Dosen Form</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('createDosen'); ?>" method="post">
            <!-- Hidden ID Dosen (otomatis) -->
            <input type="hidden" class="form-control" name="inputIdDosen" id="inputIdDosen" value="<?= date('YmdHis'); ?>">

            <div class="form-group">
                <label for="inputNidn">NIDN</label>
                <input type="text" class="form-control" name="inputNidn" id="inputNidn" required>
            </div>
            <div class="form-group">
                <label for="inputNiy">NIY</label>
                <input type="text" class="form-control" name="inputNiy" id="inputNiy" required>
            </div>
            <div class="form-group">
                <label for="inputNamaLengkap">Nama Lengkap</label>
                <input type="text" class="form-control" name="inputNamaLengkap" id="inputNamaLengkap" required>
            </div>
            <div class="form-group">
                <label for="inputAlamat">Alamat</label>
                <input type="text" class="form-control" name="inputAlamat" id="inputAlamat" required>
            </div>
            <div class="form-group mt-2">
    <label for="inputUserId">User</label>
    <select class="form-control select2" name="inputUserId" id="inputUserId" required>
        <option value="">-- Pilih User --</option>
        <?php foreach ($users as $user): ?>
            <option value="<?= $user['id']; ?>"><?= $user['username']; ?></option>
        <?php endforeach; ?>
    </select>
</div>
            <div class="d-grid gap-2 mt-3">
                <button class="btn btn-primary" type="submit">Save Data</button>
            </div>
        </form>
    </div>
</div>

<!-- Tambahkan di <head> -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Tambahkan sebelum </body> -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: 'Pilih User',
            allowClear: true
        });
    });
</script>


<?= $this->endSection(); ?>
