<?php

namespace App\Controllers;

use App\Models\BerkasModel;
use App\Controllers\BaseController;

class Berkas extends BaseController
{
    protected $BerkasModel;
    protected $session;

    public function __construct()
    {
        $this->BerkasModel = new BerkasModel();
        $this->session = session();
    }

    public function index()
    {
        $idUser = $this->session->get('id_user');
        $role = $this->session->get('role') ?? 'user';
        $isAdmin = ($role === 'admin');

        $files = $this->BerkasModel->getFilesByUserOrAll($idUser, $isAdmin);

        return view('berkas/index', ['files' => $files, 'isAdmin' => $isAdmin]);
    }

    public function upload()
    {
        helper(['form', 'url']);
        $idUser = $this->session->get('id_user');
        if (!$this->request->getFile('file_upload')->isValid()) {
            return redirect()->back()->with('error', 'File gagal diupload.');
        }

        $file = $this->request->getFile('file_upload');
        $originalName = $file->getClientName();

        // Buat unique name untuk disimpan, misal prefix timestamp + random
        $uniqueName = strtotime(date('Y-m-d H:i:s')) . '_' . bin2hex(random_bytes(5)) . '.' . $file->getClientExtension();

        // Pindahkan file ke writable/uploads dengan nama unik
        if (!$file->move(WRITEPATH . 'uploads', $uniqueName)) {
            return redirect()->back()->with('error', 'Gagal menyimpan file.');
        }

        // Simpan data ke database
        $this->BerkasModel->save([
            'original_name' => $originalName,
            'unique_name' => $uniqueName,
            'id_user' => $idUser,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/files')->with('success', 'File berhasil diupload.');
    }
}
