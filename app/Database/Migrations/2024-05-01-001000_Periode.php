<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Periode extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_periode'       => ['type' => 'INT','constraint' => 11,  'unsigned'       => true, 'auto_increment' => true],
            'tahun_audit'      => ['type' => 'YEAR'],
            'tgl_mulai'        => ['type' => 'DATE'],
            'tgl_selesai'      => ['type' => 'DATE'],
            'status_periode'   => ['type' => 'ENUM', 'constraint' => ['aktif', 'nonaktif'], 'default' => 'nonaktif'],
            'created_at'       => ['type' => 'DATETIME', 'null' => true],
            'updated_at'       => ['type' => 'DATETIME', 'null' => true],
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
        $this->forge->addKey('id_periode', true);
        $this->forge->createTable('periode_audit');
    }

    public function down()
    {
        $this->forge->dropTable('periode_audit');
    }
}
