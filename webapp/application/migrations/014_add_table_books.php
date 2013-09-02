<?php
class Migration_Add_table_books extends CI_Migration{

	public function up(){


	$params=array(
		'book_name'=>array(
			'type'=>'varchar',
			'constraint'=>250,
			),

		'id'=>array(
			'type'=>'int',
			'constraint'=>3,
			'auto_increment'=>true,
			),

		'book_author'=>array(
			'type'=>'varchar',
			'constraint'=>250,
			),
		
		'book_edition'=>array(
			'type'=>'varchar',
			'constraint'=>50,
			),
		
		
		);

	$this->dbforge->add_field($params);
	$this->dbforge->add_key('id',true);
	$this->dbforge->create_table('books');
	
		}

	public function down(){

	$this->dbforge->drop_table('books');


	}
}
