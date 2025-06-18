<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EvaluasiDiri extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_evaluasi' => [
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
            'id_prodi' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            // Nilai atau skor dari faktor standar yang dimiliki (misal rentang 0–100)
            'nilai_standar' => [
                'type'       => 'INT',
                'constraint' => 3,
                'unsigned'   => true,
                'null'       => true,
                'comment'    => 'Skor evaluasi berdasarkan faktor standar (0–100)',
            ],
            // Penjelasan tentang faktor internal yang mempengaruhi evaluasi prodi
            'faktor_internal' => [
                'type' => 'TEXT',
                'null' => true,
                'comment' => 'Deskripsi pengaruh faktor internal terhadap capaian prodi',
            ],
            // Penjelasan tentang faktor eksternal yang mempengaruhi evaluasi prodi
            'faktor_eksternal' => [
                'type' => 'TEXT',
                'null' => true,
                'comment' => 'Deskripsi pengaruh faktor eksternal terhadap capaian prodi',
            ],
            // Kesimpulan singkat atau hasil akhir evaluasi (opsional)
            'kesimpulan' => [
                'type' => 'TEXT',
                'null' => true,
                'comment' => 'Ringkasan hasil evaluasi prodi',
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

        $this->forge->addKey('id_evaluasi', true);
        // Relasi ke tabel standar_lembaga_akreditasi
        $this->forge->addForeignKey('id_standar', 'standar_lembaga_akreditasi', 'id_standar', 'CASCADE', 'CASCADE');
        // Relasi ke tabel prodi
        $this->forge->addForeignKey('id_prodi', 'prodi', 'id_prodi', 'CASCADE', 'CASCADE');
        $this->forge->createTable('evaluasi_diri');
    }


    public function down()
    {
        $this->forge->dropTable('evaluasi_diri');
    }
}
