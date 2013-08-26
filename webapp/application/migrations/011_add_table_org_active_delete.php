<?php
class Migration_Add_table_org_active_delete extends CI_Migration{

	public function up(){


	$params=array(
		'is_active'=>array(
			'type'=>'boolean',
			),
		'is_delete'=>array(
			'type'=>'boolean',
			),
	);
	$this->dbforge->add_column('organizations',$params);
	
	}
	public function down(){

	$this->dbforge->drop_column('organizations','is_active');
	$this->dbforge->drop_column('organizations','is_delete');


	}
}
