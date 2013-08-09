<?php
class Migration_Add_table_org_active_delete extends CI_Migration{

	public function up() {
	
		$params=array(
			'created_at'=>array(
				'type'=>'datetime',
			),
			'updated_at'=>array(
				'type'=>'datetime',
			),
		);

		$this->dbforge->add_column('organizations',$params);
	}
	
	public function down() {

		$this->dbforge->drop_column('organizations','updated_at');
		$this->dbforge->drop_column('organizations','created_at');
	}
}
