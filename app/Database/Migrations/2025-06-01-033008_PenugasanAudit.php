<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PenugasanAudit extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penugasan'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_periode'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'id_auditor'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'id_fakultas'    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'id_prodi'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'id_unit_kerja'  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],
            'created_by'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'updated_by'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
        ]);

        $this->forge->addKey('id_penugasan', true);
        $this->forge->addForeignKey('id_periode', 'periode_audit', 'id_periode', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_auditor', 'auditor', 'id_auditor', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_fakultas', 'fakultas', 'id_fakultas', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('id_prodi', 'prodi', 'id_prodi', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('id_unit_kerja', 'unit_kerja', 'id_unit_kerja', 'SET NULL', 'CASCADE');
        $this->forge->createTable('penugasan_audit');
    }

    public function down()
    {
        $this->forge->dropTable('penugasan_audit');
    }
}
