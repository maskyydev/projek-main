<?= $this->include('common/header') ?>
<div class="p-4">
    <h1 class="text-2xl font-bold mb-4"><?= esc($title) ?></h1>

    <form action="<?= base_url('Dosen/createDosen') ?>" method="post" class="space-y-4">
        <input type="hidden" name="inputIdDosen" value="<?= date('YmdHis') ?>">

        <div>
            <label class="block mb-1">NIDN</label>
            <input type="text" name="inputNidn" class="border p-2 w-full" required>
        </div>

        <div>
            <label class="block mb-1">NIY</label>
            <input type="text" name="inputNiy" class="border p-2 w-full" required>
        </div>

        <div>
            <label class="block mb-1">Nama Lengkap</label>
            <input type="text" name="inputNamaLengkap" class="border p-2 w-full" required>
        </div>

        <div>
            <label class="block mb-1">Alamat</label>
            <input type="text" name="inputAlamat" class="border p-2 w-full" required>
        </div>

        <div>
            <label class="block mb-1">Pilih User</label>
            <select name="inputUserId" class="border p-2 w-full" required>
                <option value="">-- Pilih User --</option>
                <?php foreach ($users as $u): ?>
                    <option value="<?= $u['id'] ?>"><?= esc($u['fullname']) ?> (<?= esc($u['username']) ?>)</option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
        <a href="<?= base_url('dosen') ?>" class="bg-gray-400 text-white px-4 py-2 rounded">Batal</a>
    </form>
</div>
<?= $this->include('common/footer') ?>
