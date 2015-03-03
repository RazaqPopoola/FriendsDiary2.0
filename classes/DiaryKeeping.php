<?php

class DiaryKeeping extends Member{
	
	public function keepDiary($fields = array()){
			
			if(!$this->_db->insert('diary', $fields)) {
				
				throw new Exception('There was a problem creating the diary.');
			}
	}
	
	
	public function updateDiary(){
		
		
		
	}
	
	
	public function deleteDiary(){
		
		
	}
	
	public function showDairy(){
		
	}

}
?>