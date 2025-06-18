<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MatrixPenilaian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_matrix' => [
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
            'deskripsi_kriteria' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'nilai' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'unsigned'   => true,
                'comment'    => 'Rentang nilai 1–4',
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
                'unsigned'   => true,
                'null'       => true,
            ],
            'updated_by' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id_matrix', true);
        $this->forge->addForeignKey('id_standar', 'standar_lembaga_akreditasi', 'id_standar', 'CASCADE', 'CASCADE');
        $this->forge->createTable('matrix_penilaian');
    }

    public function down()
    {
        $this->forge->dropTable('matrix_penilaian');
    }
}
