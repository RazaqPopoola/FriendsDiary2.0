<?php 

	class Administrator extends Member{
		
		private $_db;
		
		public function __construct(){
			
			$this->_db = DB::getInstance($member = null);
		}
		
		
		
	}



?>