<?php
class Migration_Add_table_courses extends CI_Migration{

	public function up(){


	$params=array(
		'cname'=>array(
			'type'=>'varchar',
			'constraint'=>250,
			),

		'id'=>array(
			'type'=>'int',
			'constraint'=>3,
			'auto_increment'=>true,
			),

		'catagory'=>array(
			'type'=>'varchar',
			'constraint'=>150,
			),
		
		'course_code'=>array(
			'type'=>'varchar',
			'constraint'=>250,
			),

		'duration'=>array(
			'type'=>'varchar',
			'constraint'=>200,
			),
		'created_at'=>array(
			'type'=>'datetime',
			),

		'update_at'=>array(
			'type'=>'datetime',
			),
		
		);

	

	$this->dbforge->add_field($params);
	$this->dbforge->add_key('id',true);
	$this->dbforge->create_table('courses');
		
	
		}

	public function down(){

	$this->dbforge->drop_table('courses');
	
	}
}
