<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
Selamat Datang <?=$session = session('fullname'); ?> Role Kamu <?=$session = session('role'); ?> 
<?= $this->endSection(); ?>