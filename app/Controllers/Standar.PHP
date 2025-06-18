<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StandarModel;
use App\Models\LembagaModel;

class Standar extends BaseController
{
    protected $standarModel;
    protected $lembagaModel;
    protected $data;

    public function __construct()
    {
        $this->standarModel = new StandarModel();
        $this->lembagaModel = new LembagaModel();
        $this->data = [
            'title' => 'Standar Lembaga Akreditasi'
        ];
    }

    public function index()
    {
        $data = array_merge($this->data, [
            'title' => 'Standar Lembaga Akreditasi',
            'standar' => $this->standarModel->getStandar()
        ]);
        return view('standar/index', $data);
    }

    public function form($id = null)
    {
        $standar = $id ? $this->standarModel->getStandar($id) : null;

        $data = array_merge($this->data, [
            'title' => 'Standar Lembaga Akreditasi',
            'standar' => $standar,
            'lembaga' => $this->lembagaModel->findAll()
        ]);

        return view('standar/form', $data);
    }

    public function saveStandar($id_standar = null)
    {
        $data = [
            'id_lemb'       => $this->request->getPost('id_lemb'),
            'kode_standar'  => $this->request->getPost('kode_standar'),
            'nama_standar'  => $this->request->getPost('nama_standar'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
        ];

        if ($id_standar !== null) {
            // Proses Update
            $data['updated_by'] = session()->get('id_user') ?? 1;
            $data['updated_at'] = date('Y-m-d H:i:s');

            $this->standarModel->update($id_standar, $data);
            session()->setFlashdata('notif_success', 'Data Standar berhasil diperbarui.');
        } else {
            // Proses Insert
            $data['created_by'] = session()->get('id_user') ?? 1;
            $data['created_at'] = date('Y-m-d H:i:s');

            try {
                if ($this->standarModel->insert($data)) {
                    session()->setFlashdata('notif_success', 'Data Standar berhasil ditambahkan.');
                } else {
                    session()->setFlashdata('notif_error', 'Gagal menambahkan data Standar.');
                }
            } catch (\Exception $e) {
                // Tangani duplikat kode_standar atau error lainnya
                session()->setFlashdata('notif_error', 'Kode Standar sudah digunakan atau terjadi kesalahan.');
            }
        }

        return redirect()->to('/standar');
    }


    public function deleteStandar($id)
    {
        if (!$id) {
            return redirect()->to('/standar');
        }

        $delete = $this->standarModel->deleteStandar($id);

        if ($delete) {
            session()->setFlashdata('notif_success', 'Data Standar berhasil dihapus.');
        } else {
            session()->setFlashdata('notif_error', 'Gagal menghapus data Standar.');
        }

        return redirect()->to('/standar');
    }
}
