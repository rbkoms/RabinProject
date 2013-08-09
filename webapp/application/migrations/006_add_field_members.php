<?php
class Migration_Add_Field_Members extends CI_Migration
{

	public function up() {
		$params=array(
		'org_id'=>array(
			'type'=>'int'
			),
		);
	$this->dbforge->add_column('members',$params);
	}

	public function down() {

	$this->dbforge->drop_column('members','org_id');
}
}
?>