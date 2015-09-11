<?php
class Migration_Create_articles extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'title' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'slug' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'details' => array(
				'type' => 'TEXT',
			),
			'start_datetime' => array(
				'type' => 'DATETIME',
			),
			'end_datetime' => array(
				'type' => 'DATETIME',
			),
			'created' => array(
				'type' => 'DATETIME',
			),
			'modified' => array(
				'type' => 'DATETIME',
			),
			'user_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'default' => 0
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('events');
	}

	public function down()
	{
		$this->dbforge->drop_table('events');
	}
}