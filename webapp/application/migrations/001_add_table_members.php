<?php
class Migration_Add_table_members extends CI_Migration{

	public function up(){


	$params=array(
		'first_name'=>array(
			'type'=>'varchar',
			'constraint'=>250,
			),


		'id'=>array(
			'type'=>'int',
			'constraint'=>3,
			'auto_increment'=>true,
			),

		'last_name'=>array(
			'type'=>'varchar',
			'constraint'=>250,
			),
		
		'email'=>array(
			'type'=>'varchar',
			'constraint'=>50,
			),
		
		'sex'=>array(
			'type'=>'varchar',
			'constraint'=>20,
			),
		'username'=>array(
			'type'=>'varchar',
			'constraint'=>250,
			),
		'password'=>array(
			'type'=>'varchar',
			'constraint'=>200,
			),
		);

	$this->dbforge->add_field($params);
	$this->dbforge->add_key('id',true);
	$this->dbforge->create_table('members');
	
		}

	public function down(){

	$this->dbforge->drop_table('members');


	}
}
