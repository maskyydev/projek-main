<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usermenu extends Migration
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
			'menu_category'      => [
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
			'icon'       => [
				'type'       => 'TEXT'
			],
			'parent'       => [
				'type'       => 'TINYINT',
				'constraint' => '1',
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
		$this->forge->createTable('user_menu');
    }

    public function down()
    {
        $this->forge->dropTable('user_menu');
    }
}
