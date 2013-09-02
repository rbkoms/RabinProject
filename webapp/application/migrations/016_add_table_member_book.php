<?php 
class Migration_Add_Table_member_book extends CI_Migration {

public function up() {
		
		$params = array(
			'id'=> array(
				'type'=>'int',
				'auto_increment'=>TRUE
				),

			'member_id'=> array(

				'type'=> 'int',

				),
			'book_id'=> array(

				'type'=> 'int',
	
				),	
			'created_at'=>array(

				'type'=>'datetime',
				),
			'updated_at'=>array(
				'type'=>'datetime',
				),	
			'is_expired'=>array(
				'type'=>'boolean'
				)		
			);
		

		$this->dbforge->add_field($params);
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('member_books');
	}


	public function down()
	
	{
		$this->dbforge->drop_table('member_books');
	}

}