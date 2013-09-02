<?php 
class Migration_Add_table_org_book extends CI_Migration {

	public function up() {
		$organization_books = array(
			'id'=> array(
				'type'=>'int',
				'auto_increment'=>TRUE
				),

			'organization_id'=> array(

				'type'=> 'int',

				),
			'book_id'=> array(

				'type'=> 'int',
	
				),	
			'available_quantity'=> array(

				'type'=> 'int',
	
				),	
			'used_quantity'=> array(

				'type'=> 'int',
	
				),	
			'quantity'=>array(
				
				'type'=>'int',
				),
			'created_at'=>array(

				'type'=>'datetime',
				),
			'updated_at'=>array(
				'type'=>'datetime',
				),	
			);
		

		$this->dbforge->add_field($organization_books);
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('organization_books');
	}


	public function down() {
		
		$this->dbforge->drop_table('organization_books');
	}

}