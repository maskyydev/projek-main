<?php

// File: 2024-05-01-006000_AddForeignKeyToProdi.php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddForeignKeyToProdi extends Migration
{
    public function up()
    {
        $this->db->query('ALTER TABLE prodi ADD COLUMN id_dosen INT UNSIGNED');
        $this->forge->addForeignKey('id_dosen', 'dosen', 'id_dosen', 'CASCADE', 'CASCADE');
        $this->forge->processIndexes('prodi');
    }

    public function down()
    {
        $this->db->query('ALTER TABLE prodi DROP FOREIGN KEY prodi_id_dosen_foreign');
        $this->db->query('ALTER TABLE prodi DROP COLUMN id_dosen');
    }
}