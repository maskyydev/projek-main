<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PermintaanTindakanKoreksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_koreksi' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_temuan' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'uraian_tindakan' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'penanggung_jawab' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'tgl_rencana' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'tgl_realisasi' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['diajukan', 'diproses', 'selesai'],
                'default'    => 'diajukan',
                'null'       => false,
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

        $this->forge->addKey('id_koreksi', true);
        $this->forge->addForeignKey('id_temuan', 'temuan_audit', 'id_temuan', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tindakan_koreksi');
    }

    public function down()
    {
        $this->forge->dropTable('tindakan_koreksi');
    }
}
