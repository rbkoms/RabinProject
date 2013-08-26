<?php
class Migration_Add_table_enrollment extends CI_Migration{

	public function up(){

	$enrollment= array(
			'id'=>array(
				'type'=>'int',
				'auto_increment'=>TRUE
				),

			'course_id'=>array(
				'type'=>'int',			
				),

			'member_id'=>array(
				'type'=>'int',
				),
			
			'is_active'=>array(
				'type'=>'boolean',
			),
			'is_delete'=>array(
				'type'=>'boolean',
			),
			);


	$this->dbforge->add_field($enrollment);
	$this->dbforge->add_key('id',true);
	$this->dbforge->create_table('enrollment');
		
	
		}

	public function down(){

	$this->dbforge->drop_column('enrollment');


	}
}
