<?php
class Migration_Add_table_member_org_count extends CI_Migration{

	public function up(){


	$params=array(
		'count_members'=>array(
			'type'=>'int',
			),
		'count_organization_enrollments'=>array(
			'type'=>'int',
			),
	);
	$this->dbforge->add_column('organizations',$params);
	
	}
	public function down(){

	$this->dbforge->drop_column('organizations','$count_members');
	$this->dbforge->drop_column('organizations','$count_organization_enrollments');


	}
}
