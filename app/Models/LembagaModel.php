<?php

namespace App\Models;

use CodeIgniter\Model;

class LembagaModel extends Model
{
    protected $table      = 'lemb_akreditasi';
    protected $primaryKey = 'id_lemb';
    protected $allowedFields = ['nama_lembaga', 'created_at', 'updated_at', 'created_by', 'updated_by'];

    public function getLembaga($id = false)
    {
        if ($id) {
            return $this->where(['id_lemb' => $id])->first();
        } else {
            return $this->findAll();
        }
    }

    public function createLembaga($data)
    {
        return $this->insert([
            'nama_lembaga' => $data['inputNamaLembaga'],
            'created_at'   => date('Y-m-d H:i:s'),
            'created_by'   => $data['inputCreatedBy'] ?? null
        ]);
    }

    public function updateLembaga($data)
    {
        return $this->update($data['inputLembagaID'], [
            'nama_lembaga' => $data['inputNamaLembaga'],
            'updated_at'   => date('Y-m-d H:i:s'),
            'updated_by'   => $data['inputUpdatedBy'] ?? null
        ]);
    }

    public function deleteLembaga($id)
    {
        return $this->delete(['id_lemb' => $id]);
    }
}
