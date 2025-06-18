<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Auditor extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_auditor'   => [
            'type' => 'INT',
            'constraint' => 11, 'unsigned' => true, 
            'auto_increment' => true
            ],
            'id_dosen'     => [
            'type'       => 'INT',
            'constraint' => 11,
            'unsigned'   => true,],
            'status_aktif' => ['type' => 'ENUM', 'constraint' => ['aktif', 'nonaktif'], 'default' => 'aktif'],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
            'updated_at'   => ['type' => 'DATETIME', 'null' => true],
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

        $this->forge->addKey('id_auditor', true);
        $this->forge->addForeignKey('id_dosen', 'dosen', 'id_dosen', 'CASCADE', 'CASCADE');
        $this->forge->createTable('auditor');
    }

    public function down()
    {
        $this->forge->dropTable('auditor');
    }
}
