<?php

namespace App\Models;

use CodeIgniter\Model;

class StandarModel extends Model
{
    protected $table      = 'standar_lembaga_akreditasi';
    protected $primaryKey = 'id_standar';
    protected $allowedFields = [
        'id_lemb',
        'kode_standar',
        'nama_standar',
        'deskripsi',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];

    // Ambil semua data standar atau berdasarkan ID tertentu
    public function getStandar($idStandar = false)
    {
        if ($idStandar) {
            return $this->db->table($this->table)
                ->where('id_standar', $idStandar)
                ->get()
                ->getRowArray();
        }

        return $this->db->table($this->table)
            ->select('standar_lembaga_akreditasi.*, lemb_akreditasi.nama_lembaga')
            ->join('lemb_akreditasi', 'lemb_akreditasi.id_lemb = standar_lembaga_akreditasi.id_lemb', 'left')
            ->get()
            ->getResultArray();
    }

    // Tambah data standar
    public function createStandar($data)
    {
        return $this->db->table($this->table)->insert([
            'id_lemb'       => $data['id_lemb'],
            'kode_standar'  => $data['kode_standar'],
            'nama_standar'  => $data['nama_standar'],
            'deskripsi'     => $data['deskripsi'],
            'created_at'    => date('Y-m-d H:i:s'),
            'created_by'    => $data['created_by'] ?? null
        ]);
    }

    // Update data standar
    public function updateStandar($id, $data)
    {
        return $this->db->table($this->table)
            ->where('id_standar', $id)
            ->update([
                'id_lemb'       => $data['id_lemb'],
                'kode_standar'  => $data['kode_standar'],
                'nama_standar'  => $data['nama_standar'],
                'deskripsi'     => $data['deskripsi'],
                'updated_at'    => date('Y-m-d H:i:s'),
                'updated_by'    => $data['updated_by'] ?? null
            ]);
    }

    // Hapus data standar
    public function deleteStandar($idStandar)
    {
        return $this->db->table($this->table)
            ->where('id_standar', $idStandar)
            ->delete();
    }
}
