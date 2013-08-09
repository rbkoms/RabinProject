<?php
class Migration_Add_table_active_delete extends CI_Migration{

	public function up(){


	$params=array(
		'is_active'=>array(
			'type'=>'int',
			),
		'is_delete'=>array(
			'type'=>'int',
			),
	);
	$this->dbforge->add_column('members',$params);
	
	}
	public function down(){

	$this->dbforge->drop_column('members','is_active');
	$this->dbforge->drop_column('members','is_delete');


	}
}
