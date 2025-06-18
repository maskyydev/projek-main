<?php

namespace App\Models;

use CodeIgniter\Model;

class CapaianModel extends Model
{
    protected $table            = 'capaian_kinerja_prodi';
    protected $primaryKey       = 'id_capaian';
    protected $allowedFields    = [
        'id_standar', 'id_prodi', 'deskripsi_capaian', 'tahun',
        'created_at', 'updated_at', 'created_by', 'updated_by'
    ];

    public function getCapaian($id = null)
    {
        $builder = $this->db->table($this->table)
            ->select('capaian_kinerja_prodi.*, prodi.nama_prodi, standar_lembaga_akreditasi.nama_standar AS nama_standar')
            ->join('prodi', 'prodi.id_prodi = capaian_kinerja_prodi.id_prodi', 'left')
            ->join('standar_lembaga_akreditasi', 'standar_lembaga_akreditasi.id_standar = capaian_kinerja_prodi.id_standar', 'left')
            ->orderBy('capaian_kinerja_prodi.id_capaian', 'ASC');

        if ($id) {
            $builder->where('capaian_kinerja_prodi.id_capaian', $id);
            return $builder->get()->getRowArray();
        }

        return $builder->get()->getResultArray();
    }
}
