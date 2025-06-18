<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table      = 'dosen';
    protected $primaryKey = 'id_dosen';
    protected $allowedFields = ['id_dosen', 'nidn', 'niy', 'nama_lengkap', 'alamat', 'user_id'];

     public function userSudahMenjadiDosen($userId)
    {
        return $this->where('user_id', $userId)->first() !== null;
    }
    
public function getDosen($DosenID = false)
    {
        if ($DosenID) {
            return $this->db->table('dosen')
            ->where(['dosen.id' => $DosenID])
            ->get()->getRowArray();
        } else {
            return $this->db->table('dosen')
            ->get()->getResultArray();
        }
    }
     public function createDosen($dataDosen)
    {
        return $this->db->table('dosen')->insert([
          'nidn'     	=> $dataDosen['inputNidn'],
          'niy'     	=> $dataDosen['inputNiy'],
          'nama_lengkap'     	=> $dataDosen['inputNamaLengkap'],
          'alamat'     	=> $dataDosen['inputAlamat'],
          'user_id'     	=> $dataDosen['inputUserId'], 
        ]);
    }
     public function updateDosen($dataDosen)
    {
        return $this->db->table('dosen')->update([
          'nidn'     	=> $dataDosen['inputNidn'],
          'niy'     	=> $dataDosen['inputNiy'],
          'nama_lengkap'     	=> $dataDosen['inputNamaLengkap'],
          'alamat'     	=> $dataDosen['inputAlamat'],
          'user_id'     	=> $dataDosen['inputUserId'], 
            ], ['id' => $dataDosen['inputDosenID']]);
    }
    public function deleteDosen($DosenID)
	{
		return $this->db->table('dosen')->delete(['id' => $DosenID]);
	}
}