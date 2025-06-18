<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdiModel;

class Prodi extends BaseController
{
    protected $ProdiModel;

    public function __construct()
    {
        $this->ProdiModel = new ProdiModel();
    }

    public function index()
    {
        $data = array_merge($this->data ?? [], [
            'title' => 'Program Studi',
            'prodi' => $this->ProdiModel->findAll()
        ]);

        return view('prodi/index', $data);
    }

    public function form($id = null)
    {
        $data = array_merge($this->data ?? [], [
            'title' => $id ? 'Edit Prodi' : 'Tambah Prodi',
            'prodi' => $id ? $this->ProdiModel->find($id) : null
        ]);

        return view('prodi/form', $data);
    }

    public function save()
    {
        $id = $this->request->getPost('id_prodi');
        $data = [
            'nama_prodi' => $this->request->getPost('nama_prodi'),
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => 1,
        ];

        if (!$id) {
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = 1;
            $this->ProdiModel->insert($data);
            session()->setFlashdata('notif_success', 'Prodi berhasil ditambahkan.');
        } else {
            $this->ProdiModel->update($id, $data);
            session()->setFlashdata('notif_success', 'Prodi berhasil diperbarui.');
        }

        return redirect()->to('/prodi');
    }

    public function create()
    {
        $data = [
            'nama_prodi' => $this->request->getPost('nama_prodi'),
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => 1, // Ubah dengan session login user jika ada
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => 1,
        ];

        $this->ProdiModel->insert($data);
        session()->setFlashdata('notif_success', 'Prodi berhasil ditambahkan.');
        return redirect()->to(base_url('prodi'));
    }

    public function update()
    {
        $id = $this->request->getPost('id_prodi');

        if (!$id) {
            session()->setFlashdata('notif_error', 'ID Prodi tidak ditemukan.');
            return redirect()->to(base_url('prodi'));
        }

        $data = [
            'nama_prodi' => $this->request->getPost('nama_prodi'),
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => 1,
        ];

        $this->ProdiModel->update($id, $data);
        session()->setFlashdata('notif_success', 'Prodi berhasil diperbarui.');
        return redirect()->to(base_url('prodi'));
    }

    public function delete($id = null)
    {
        if (!$id) {
            session()->setFlashdata('notif_error', 'ID Prodi tidak ditemukan.');
            return redirect()->to(base_url('prodi'));
        }

        $this->ProdiModel->delete($id);
        session()->setFlashdata('notif_success', 'Prodi berhasil dihapus.');
        return redirect()->to(base_url('prodi'));
    }
}
