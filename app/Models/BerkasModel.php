<?php

namespace App\Models;

use CodeIgniter\Model;

class BerkasModel extends Model
{
    protected $table = 'berkas';
    protected $primaryKey = 'id_file';
    protected $allowedFields = ['original_name', 'unique_name', 'id_user', 'created_at'];
    protected $useTimestamps = false; // karena sudah manual created_at

    public function getFilesByUserOrAll($idUser, $isAdmin)
    {
        if ($isAdmin) {
            return $this->orderBy('created_at', 'DESC')->findAll();
        } else {
            return $this->where('id_user', $idUser)->orderBy('created_at', 'DESC')->findAll();
        }
    }
}
