<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StandartLembagaAkreditasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_standar' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_lemb' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'kode_standar' => [ // kode unik
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'unique'     => true,
            ],
            'nama_standar' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi' => [
                'type'       => 'TEXT',
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

        $this->forge->addKey('id_standar', true);
        $this->forge->addForeignKey('id_lemb', 'lemb_akreditasi', 'id_lemb', 'CASCADE', 'CASCADE');
        $this->forge->createTable('standar_lembaga_akreditasi');
    }

    public function down()
    {
        $this->forge->dropTable('standar_lembaga_akreditasi');
    }
}
