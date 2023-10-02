<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AttachmentTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'request_id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'file_id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'type'                  => ['type' => 'varchar', 'constraint' => 100, 'null' => false],
            'start_date'            => ['type' => 'date'],
            'end_date'              => ['type' => 'date'],
        ]);

        $this->forge->addKey(['id', 'request_id', 'file_id'], TRUE);
        $this->forge->addForeignKey('request_id', 'request', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('file_id', 'media', 'id', '', 'CASCADE');
        $this->forge->createTable('attachment', true);
    }

    public function down()
    {
        $this->forge->dropTable('attachment');
    }
}
