<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PeluangPeningkatan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_peluang' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_standar' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'id_tilik' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            // Tambahan: diambil dari penugasan_auditor_referensi_mutu
            'id_fakultas' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'id_prodi' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'id_unit_kerja' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'bidang' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'kelebihan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'peluang' => [
                'type' => 'TEXT',
                'null' => true,
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
                'unsigned'   => true,
                'null'       => true,
            ],
            'updated_by' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id_peluang', true);
        // Relasi ke standar_lembaga_akreditasi.id_standar
        $this->forge->addForeignKey('id_standar', 'standar_lembaga_akreditasi', 'id_standar', 'CASCADE', 'CASCADE');
        // Relasi ke daftar_tilik.id_tilik (hanya untuk yang hasil_temuan = 'sesuai')
        $this->forge->addForeignKey('id_tilik', 'daftar_tilik', 'id_tilik', 'CASCADE', 'CASCADE');
        // Relasi id_fakultas → fakultas.id_fakultas (ambil dari penugasan_auditor)
        $this->forge->addForeignKey('id_fakultas', 'fakultas', 'id_fakultas', 'SET NULL', 'CASCADE');
        // Relasi id_prodi → prodi.id_prodi (ambil dari penugasan_auditor)
        $this->forge->addForeignKey('id_prodi', 'prodi', 'id_prodi', 'SET NULL', 'CASCADE');
        // Relasi id_unit_kerja → unit_kerja.id_unit_kerja (ambil dari penugasan_auditor)
        $this->forge->addForeignKey('id_unit_kerja', 'unit_kerja', 'id_unit_kerja', 'SET NULL', 'CASCADE');

        $this->forge->createTable('peluang_peningkatan');
    }

    public function down()
    {
        $this->forge->dropTable('peluang_peningkatan');
    }
}