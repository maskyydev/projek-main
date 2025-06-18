<?= $this->extend('layouts/main'); ?>
		<?= $this->section('content'); ?>
		<h1 class="h3 mb-3"><strong><?= $title; ?></strong> List Menu </h1>
		<div class="card">
            <h5 class="card-title mb-0">
    Dosen List 
    <a href="#" id="createDosenBtn" data-url="<?= base_url('Dosen/form'); ?>" class="btn btn-primary btn-sm float-end">
        Create New Dosen
    </a>
</h5>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
        <thead> 
           <th>ID</th> 
           <th>NIDN</th> 
           <th>NIY</th> 
           <th>Nama Lengkap</th> 
           <th>Alamat</th> 
           <th>User Id</th> 
         </thead>
        <tbody>
        <?php foreach($Dosen as $dosen ): ?>   
            <tr>  
                <td><?= $dosen['id_dosen'] ?> </td>  
                <td><?= $dosen['nidn'] ?> </td>  
                <td><?= $dosen['niy'] ?> </td>  
                <td><?= $dosen['nama_lengkap'] ?> </td>  
                <td><?= $dosen['alamat'] ?> </td>  
                <td><?= $dosen['user_id'] ?> </td>  
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('createDosenBtn').addEventListener('click', function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Pastikan sudah membuat akun users!',
            text: 'Apakah Anda yakin ingin melanjutkan?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, lanjutkan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = this.dataset.url;
            }
        });
    });
</script>

		<?= $this->endSection(); ?>
		