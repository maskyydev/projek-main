<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LembagaModel;

class Lembaga extends BaseController
{
    protected $LembagaModel;

    public function __construct()
    {
        $this->LembagaModel = new LembagaModel();
    }

    public function index()
    {
        $data = array_merge($this->data ?? [], [
            'title'   => 'Lembaga Akreditasi',
            'lembaga' => $this->LembagaModel->getLembaga()
        ]);

        return view('lembaga/index', $data);
    }

    public function form($id = null)
    {
        $data = array_merge($this->data ?? [], [
            'title'   => $id ? 'Edit Lembaga' : 'Tambah Lembaga',
            'lembaga' => $id ? $this->LembagaModel->getLembaga($id) : null
        ]);

        return view('lembaga/form', $data);
    }

    public function save()
    {
        $id = $this->request->getPost('id_lemb');
        $nama = $this->request->getPost('nama_lembaga');

        if (!$id) {
            $this->LembagaModel->createLembaga([
                'inputNamaLembaga' => $nama,
                'inputCreatedBy'   => 1
            ]);
            session()->setFlashdata('notif_success', 'Lembaga berhasil ditambahkan.');
        } else {
            $this->LembagaModel->updateLembaga([
                'inputLembagaID'   => $id,
                'inputNamaLembaga' => $nama,
                'inputUpdatedBy'   => 1
            ]);
            session()->setFlashdata('notif_success', 'Lembaga berhasil diperbarui.');
        }

        return redirect()->to('/lembaga');
    }

    public function delete($id = null)
    {
        if (!$id) {
            session()->setFlashdata('notif_error', 'ID Lembaga tidak ditemukan.');
            return redirect()->to('/lembaga');
        }

        $this->LembagaModel->deleteLembaga($id);
        session()->setFlashdata('notif_success', 'Lembaga berhasil dihapus.');
        return redirect()->to('/lembaga');
    }
}
