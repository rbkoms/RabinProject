<?php
class Migration_Add_table_field_users extends CI_Migration{

	public function up(){

	$params=array(
		'member_id'=>array(
			'type'=>'int',
			),
		);
	$this->dbforge->add_column('users',$params);
	
	}
	
	public function down() {

	$this->dbforge->drop_column('users','member_id');
	}
}
