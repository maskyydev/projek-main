<?php

// File: 2024-05-01-005000_UnitKerja.php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UnitKerja extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_unit_kerja' => [
                'type' => 'INT',
                'constraint'     => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_unit' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'id_dosen' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'created_by' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
                'unsigned'   => true,
            ],
            'updated_by' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
                'unsigned'   => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id_unit_kerja');
        $this->forge->addForeignKey('id_dosen', 'dosen', 'id_dosen', 'CASCADE', 'CASCADE');
        $this->forge->createTable('unit_kerja');
    }

    public function down()
    {
        $this->forge->dropTable('unit_kerja');
    }
}
