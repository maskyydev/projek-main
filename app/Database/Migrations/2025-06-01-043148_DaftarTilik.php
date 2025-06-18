<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaftarTilik extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tilik' => [
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
            'pertanyaan' => ['type' => 'TEXT'],
            'jawaban' => ['type' => 'TEXT', 'null' => true],
            'link_bukti' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'hasil_observasi' => ['type' => 'TEXT', 'null' => true],
            'hasil_temuan' => [
                'type'       => 'ENUM',
                'constraint' => ['sesuai', 'tidak_sesuai_mayor', 'tidak_sesuai_minor', 'observasi'],
                'null'       => true,
            ],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'created_by' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'updated_by' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
        ]);

        $this->forge->addKey('id_tilik', true);
        $this->forge->addForeignKey('id_standar', 'standar_lembaga_akreditasi', 'id_standar', 'CASCADE', 'CASCADE');
        $this->forge->createTable('daftar_tilik');
    }

    public function down()
    {
        $this->forge->dropTable('daftar_tilik');
    }
}
