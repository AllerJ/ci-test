<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddLocation extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'location_id' => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'location_origin' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'location_destination' => [
				'type' => 'TEXT',
				'null' => true,
			],
			'location_distance' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'location_duration' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
		]);
		$this->forge->addKey('location_id', true);
		$this->forge->createTable('location');
	}

	public function down()
	{
		$this->forge->dropTable('location');
	}
}
