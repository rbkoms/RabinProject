<?php
class Migration_Add_table_organization_enrollment extends CI_Migration{

	public function up(){

	$enrollment= array(
			'id'=>array(
				'type'=>'int',
				'auto_increment'=>TRUE
				),

			'course_id'=>array(
				'type'=>'int',			
				),

			'organization_id'=>array(
				'type'=>'int',
				),
			
			'is_active'=>array(
				'type'=>'boolean',
			),
			'is_delete'=>array(
				'type'=>'boolean',
			),
			'created_at'=>array(
			'type'=>'datetime',
			),

			'update_at'=>array(
			'type'=>'datetime',
			),
			);


	$this->dbforge->add_field($enrollment);
	$this->dbforge->add_key('id',true);
	$this->dbforge->create_table('organization_enrollments');
		
	
		}

	public function down(){

	$this->dbforge->drop_column('organization_enrollments');


	}
}
