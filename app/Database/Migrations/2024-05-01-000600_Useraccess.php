<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Useraccess extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'role_id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true
			],
			'menu_category_id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true
			],
			'menu_id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true
			],
			'submenu_id'         => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true
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
		$this->forge->createTable('user_access');
    }

    public function down()
    {
        $this->forge->dropTable('user_access');
    }
}
