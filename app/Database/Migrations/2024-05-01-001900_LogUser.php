<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LogAktivitas extends Migration
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
			'table_name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'deskripsi' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'before' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'after' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'created_at' => [
				'type'           => 'datetime'
			],'create_by' => [
				'type' => 'VARCHAR',
				'constraint' => '75',
			],
            
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('log_aktivitas');
    }

    public function down()
    {
        $this->forge->dropTable('log_aktivitas');
    }
}
