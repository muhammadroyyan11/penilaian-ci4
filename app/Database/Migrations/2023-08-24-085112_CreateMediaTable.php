<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMediaTable extends Migration
{
    public function up()
    {
        // Users
        $this->forge->addField([
            'id'                    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'files_name'            => ['type' => 'varchar', 'constraint' => 255],
            'patch'                 => ['type' => 'varchar', 'constraint' => 30, 'null' => true],
            'type'                  => ['type' => 'varchar', 'constraint' => 50],
            'user_id'               => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'created_at'            => ['type' => 'datetime', 'null' => true],
            'updated_at'            => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('files_name');
//        $this->forge->addKey('user_id', true);
//        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('media', true);

    }

    public function down()
    {
        $this->forge->dropTable('media');
    }
}
