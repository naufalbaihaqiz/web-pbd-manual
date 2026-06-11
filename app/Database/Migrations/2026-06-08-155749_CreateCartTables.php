<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCartTables extends Migration
{
    public function up()
    {
        // Table cart
        $this->forge->addField([
            'id_cart' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'email_pengguna' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'coupon' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
            ],
            'subtotal_cart' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            'total_cart' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
        ]);
        $this->forge->addKey('id_cart', true);
        $this->forge->createTable('cart');

        // Table detail_cart
        $this->forge->addField([
            'id_detail' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_cart' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'nama_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'gambar_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'jumlah_produk_cart' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 1,
            ],
            'harga_jual_cart' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
        ]);
        $this->forge->addKey('id_detail', true);
        $this->forge->addForeignKey('id_cart', 'cart', 'id_cart', 'CASCADE', 'CASCADE');
        $this->forge->createTable('detail_cart');
    }

    public function down()
    {
        $this->forge->dropTable('detail_cart');
        $this->forge->dropTable('cart');
    }
}
