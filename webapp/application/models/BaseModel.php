<?php
include_once('Exceptions.php');
class BaseModel extends ActiveRecord\Model {


	public function set_is_active($bool) {
		
		$this->assign_attribute('is_active',$bool);

	}
	public function set_is_delete($bool) {
		
		$this->assign_attribute('is_delete',$bool);

	}


	public function activate() {

		$this->check_is_delete();
		
		$this->assign_attribute('is_active',1);
		$this->save();

	}

	public function deactivate() {

		$this->check_is_delete();
		
		$this->assign_attribute('is_active',0);
		$this->save();

	}


	public function delete() {

		$this->assign_attribute('is_delete',TRUE);
		$this->assign_attribute('is_active',FALSE);
		$this->save();
	}

	public function undelete() {

		$this->assign_attribute('is_delete',0);
		$this->save();
	}


    private function check_is_delete()
    {
    	if($this->is_delete) {
    	throw new DeleteException("Error Processing Request as the instance you r trying to retrive is deleted");
    	}	
    	return ;
    }

    private function check_is_active() {

    	if(!$this->is_active) {

			throw new InactiveException("Error model inactive ");
    	}
    	
    }

    public function check_is_valid() {

    	$this->check_is_delete();
    	$this->check_is_active();
    	$this->save();
    }

    public static function __callStatic($method, $args) {
			

			if (substr($method,0,17) == 'find_undeleted_by')
			{
				$method = 'find_by'.substr($method,17);
				$model = parent::__callStatic($method, $args);
				$model->check_is_delete();
				return $model;
			}
			if(substr($method,0,14)=='find_active_by')
			{
				$method = 'find_by'.substr($method,14);
				$model = parent::__callStatic($method,$args);
				return $model;
			}
			

			if(substr($method,0,13)=='find_valid_by')
			{
				$method = 'find_by'.substr($method,13);
				$model = parent::__callStatic($method,$args);
				$model->check_is_valid();
				return $model;	
			}
			if(substr($method,0,15)=='echo_table_name')
			{
				
				return static::$table_name;
			}
			$model = parent::__callStatic($method, $args);
			return $model;
		}
}

