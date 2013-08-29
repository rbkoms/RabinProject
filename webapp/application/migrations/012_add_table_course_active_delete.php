<?php
class Migration_Add_Table_course_active_delete extends CI_Migration{

	public function up(){


	$params=array(
		'is_active'=>array(
			'type'=>'boolean',
			),
		'is_delete'=>array(
			'type'=>'boolean',
			),
	);
	$this->dbforge->add_column('courses',$params);
	
	}
	public function down(){

	$this->dbforge->drop_column('courses','is_active');
	$this->dbforge->drop_column('courses','is_delete');


	}
}
