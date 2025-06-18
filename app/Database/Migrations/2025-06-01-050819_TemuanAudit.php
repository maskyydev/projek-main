<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TemuanAudit extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_temuan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'hasil_temuan' => [
                'type'    => 'TEXT',
                'null'    => true,
                'comment' => 'List id_tilik yang dipisahkan koma',
            ],
            'id_penugasan' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'temuan_audit' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'created_by' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'updated_by' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
        ]);

        $this->forge->addKey('id_temuan', true);
        $this->forge->addForeignKey('id_penugasan', 'penugasan_audit', 'id_penugasan', 'CASCADE', 'CASCADE');
        $this->forge->createTable('temuan_audit');
    }

    public function down()
    {
        $this->forge->dropTable('temuan_audit');
    }
}
