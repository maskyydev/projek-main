<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LembagaAkreditasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_lemb' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_lembaga' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
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
        $this->forge->addKey('id_lemb', true);
        $this->forge->createTable('lemb_akreditasi');
    }

    public function down()
    {
        $this->forge->dropTable('lemb_akreditasi');
    }
}
