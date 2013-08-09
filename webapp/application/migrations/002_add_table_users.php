<?php
class Migration_Add_table_users extends CI_Migration{

	public function up(){

	$params=array(
		'username'=>array(
			'type'=>'varchar',
			'constraint'=>250,
			),
		'id'=>array(
			'type'=>'int',
			'auto_increment'=>true
			),
		
		
		'password'=>array(
			'type'=>'varchar',
			'constraint'=>250,
			),
		
		
		);

	$this->dbforge->add_field($params);
	$this->dbforge->add_key('id',true);
	$this->dbforge->create_table('users');
	}

	public function down(){

	$this->dbforge->drop_table('users');


	}
}

?>