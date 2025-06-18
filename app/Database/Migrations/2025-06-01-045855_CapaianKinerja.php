<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CapaianKinerja extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_capaian' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_standar' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'id_prodi' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'deskripsi_capaian' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'tahun' => [
                'type'       => 'YEAR',
                'null'       => true,
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

        $this->forge->addKey('id_capaian', true);
        $this->forge->addForeignKey('id_standar', 'standar_lembaga_akreditasi', 'id_standar', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_prodi', 'prodi', 'id_prodi', 'CASCADE', 'CASCADE');
        $this->forge->createTable('capaian_kinerja_prodi');
    }

    public function down()
    {
        $this->forge->dropTable('capaian_kinerja_prodi');
    }
}
