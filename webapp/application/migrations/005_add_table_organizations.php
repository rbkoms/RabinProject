<?php
class Migration_Add_table_organizations extends CI_Migration{

	public function up() {

	$params=array(
		'id'=>array(
			'type'=>'int',
			'auto_increment'=>true
			),

		'org_name'=>array(
			'type'=>'varchar',
			'constraint'=>250,
			),
		
		'org_location'=>array(
			'type'=>'varchar',
			'constraint'=>250,
			),
		'org_director'=>array(
			'type'=>'varchar',
			'constraint'=>250,
			),
		'org_contact_no'=>array(
			'type'=>'varchar',
			'constraint'=>100,
			),
		);

	$this->dbforge->add_field($params);
	$this->dbforge->add_key('id',true);
	$this->dbforge->create_table('organizations');
	}

	public function down() {

	$this->dbforge->drop_table('organizations');
	}
}
