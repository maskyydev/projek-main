<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CapaianModel;
use App\Models\StandarModel;
use App\Models\ProdiModel;

class Capaian extends BaseController
{
    protected $capaianModel;
    protected $standarModel;
    protected $prodiModel;

    public function __construct()
    {
        $this->capaianModel = new CapaianModel();
        $this->standarModel = new StandarModel();
        $this->prodiModel   = new ProdiModel();
    }

    public function index()
    {
        $data = array_merge($this->data ?? [], [
            'title'   => 'Data Capaian Kinerja Prodi',
            'capaian' => $this->capaianModel->getCapaian()
        ]);

        return view('capaian/index', $data);
    }

    public function form($id = null)
    {
        $data = array_merge($this->data ?? [], [
            'title'   => $id ? 'Edit Capaian Kinerja' : 'Tambah Capaian Kinerja',
            'capaian' => $id ? $this->capaianModel->getCapaian($id) : null,
            'standar' => $this->standarModel->findAll(),
            'prodi'   => $this->prodiModel->findAll()
        ]);

        return view('capaian/form', $data);
    }

    public function create()
    {
        $data = [
            'id_standar'        => $this->request->getPost('id_standar'),
            'id_prodi'          => $this->request->getPost('id_prodi'),
            'deskripsi_capaian' => $this->request->getPost('deskripsi_capaian'),
            'tahun'             => $this->request->getPost('tahun'),
            'created_at'        => date('Y-m-d H:i:s'),
            'created_by'        => session()->get('id_user') ?? 1,
            'updated_at'        => date('Y-m-d H:i:s'),
            'updated_by'        => session()->get('id_user') ?? 1,
        ];

        $this->capaianModel->insert($data);
        session()->setFlashdata('notif_success', 'Capaian berhasil ditambahkan.');
        return redirect()->to(base_url('capaian'));
    }

    public function update()
    {
        $id = $this->request->getPost('id_capaian');

        if (!$id) {
            session()->setFlashdata('notif_error', 'ID Capaian tidak ditemukan.');
            return redirect()->to(base_url('capaian'));
        }

        $data = [
            'id_standar'        => $this->request->getPost('id_standar'),
            'id_prodi'          => $this->request->getPost('id_prodi'),
            'deskripsi_capaian' => $this->request->getPost('deskripsi_capaian'),
            'tahun'             => $this->request->getPost('tahun'),
            'updated_at'        => date('Y-m-d H:i:s'),
            'updated_by'        => session()->get('id_user') ?? 1
        ];

        $this->capaianModel->update($id, $data);
        session()->setFlashdata('notif_success', 'Capaian berhasil diperbarui.');
        return redirect()->to(base_url('capaian'));
    }

    public function delete($id = null)
    {
        if (!$id) {
            session()->setFlashdata('notif_error', 'ID Capaian tidak ditemukan.');
            return redirect()->to(base_url('capaian'));
        }

        $this->capaianModel->delete($id);
        session()->setFlashdata('notif_success', 'Capaian berhasil dihapus.');
        return redirect()->to(base_url('capaian'));
    }
}
