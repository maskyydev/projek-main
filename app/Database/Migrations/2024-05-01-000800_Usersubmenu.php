<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usersubmenu extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'menu'      => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true
			],
			'title'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'url'       => [
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
		$this->forge->addKey('id', true);
		$this->forge->createTable('user_submenu');
    }

    public function down()
    {
        $this->forge->dropTable('user_submenu');
    }
}
