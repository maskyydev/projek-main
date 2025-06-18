<?php 

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dosen extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_dosen' => [
                'type' => 'INT',
                'constraint'     => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nidn' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'niy' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false,
                'unique' => true,
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

        $this->forge->addPrimaryKey('id_dosen');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('dosen');
    }

    public function down()
    {
        $this->forge->dropTable('dosen');
    }
}
