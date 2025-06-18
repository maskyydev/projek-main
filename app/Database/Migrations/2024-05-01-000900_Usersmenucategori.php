<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usersmenucategori extends Migration
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
			'menu_category'       => [
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
		$this->forge->createTable('user_menu_category');
    }

    public function down()
    {
        $this->forge->dropTable('user_menu_category');
    }
}
