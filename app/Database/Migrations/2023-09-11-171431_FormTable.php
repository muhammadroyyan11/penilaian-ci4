<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FormTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'form_type'             => ['type' => 'varchar', 'constraint' => 256, 'null' => false],
            'created_at'            => ['type' => 'datetime', 'null' => true],
            'updated_at'            => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey(['id', 'user_id'], TRUE);
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->createTable('request', true);
    }

    public function down()
    {
        $this->forge->dropTable('request');
    }
}
