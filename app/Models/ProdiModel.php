<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdiModel extends Model
{
    protected $table      = 'prodi';
    protected $primaryKey = 'id_prodi';
    protected $allowedFields = ['id_prodi', 'nama_prodi', 'created_at', 'updated_at', 'created_by', 'updated_by'];

    // Ambil semua data prodi atau berdasarkan ID tertentu
    public function getProdi($prodiID = false)
    {
        if ($prodiID) {
            return $this->db->table($this->table)
                ->where(['id_prodi' => $prodiID])
                ->get()->getRowArray();
        } else {
            return $this->db->table($this->table)
                ->get()->getResultArray();
        }
    }

    // Tambah data prodi
    public function createProdi($data)
    {
        return $this->db->table($this->table)->insert([
            'nama_prodi' => $data['inputNamaProdi'],
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $data['inputCreatedBy'] ?? null
        ]);
    }

    // Update data prodi
    public function updateProdi($data)
    {
        return $this->db->table($this->table)->update([
            'nama_prodi' => $data['inputNamaProdi'],
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $data['inputUpdatedBy'] ?? null
        ], ['id_prodi' => $data['inputProdiID']]);
    }

    // Hapus data prodi
    public function deleteProdi($prodiID)
    {
        return $this->db->table($this->table)->delete(['id_prodi' => $prodiID]);
    }
}
