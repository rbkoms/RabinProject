<?php 
class Migration_Add_Table_feedback extends CI_Migration {

public function up() {
		
		$params = array(
			'id'=> array(
				'type'=>'int',
				'auto_increment'=>TRUE
				),

			'feedback'=>array(
				'type'=>'varchar',
				'constraint'=>250,
				),
			'name'=>array(
				'type'=>'varchar',
				'constraint'=>250,
				),
				
			'created_at'=>array(

				'type'=>'datetime',
				),
			'updated_at'=>array(
				'type'=>'datetime',
				),	
				
			);
		

		$this->dbforge->add_field($params);
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('feedback');
	}


	public function down()
	
	{
		$this->dbforge->drop_table('feedback');
	}

}