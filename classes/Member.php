<?php
	class Member {
		
		private $_db,
				$_data,
				$_sessionName,
				$_cookieName,
				$_isLoggedIn;
		
		public function __construct($member = null) {
			
			$this->_db = DB::getInstance();
			
			$this->_sessionName = Config::get('session/session_name');
			$this->_cookieName = Config::get('remember/cookie_name');
			
			if(!$member) {
				if(Session::exists($this->_sessionName)) {
					$member = Session::get($this->_sessionName);
					if($this->find($member)){
						$this->_isLoggedIn = true;
					} else {
						//process logout
					}
				}
			} else {
				$this->find($member);
			}
		}
		
		public function create($fields = array()) {
			if(!$this->_db->insert('members', $fields)) {
				throw new Exception('There was a problem creating an account.');
				
			}
		}
		
		public function find($member = null) {
			if($member) {
				$field = (is_numeric($member)) ? 'id' : 'username';
				$data = $this->_db->get('members', array($field, '=', $user));
				
				if($data->count()) {
					$this->_data = $data->first();				
					return true;
				}
			}
			return false;
		}
		public function login($username = null, $password = null, $remember = false) {
			
			if(!$username && !$password && $this->exists()) {
				Sesion::put($this->sessionName, $this->data()->id);
			} else {
				$member = $this->find($username);
				
				if($member) {
					if($this->data()->password === Hash::make($password, $this->data()->salt)) {
						Session::put($this->_sessionName, $this->data()->id);
					
						if($remember) {
							$hash = Hash::unique();
							$hashCheck = $this->_db->get('members_session', array('member_id', '=', $this->data()->id));
						
							if(!$hashCheck->count()) {
								$this->_db->insert('members_session', array(
										'member_id' => $this->data()->id,
										'hash' => $hash
								));
							}else {
								$hash = $hashCheck->first()->hash;
							}
		
							Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
						}
						return true;
					}
				}
				return false;
			}
		}
		
		public function exists() {
			
			return (!empty($this->_data)) ? true : false;
		}
		
		public function logout() {
			
			$this->_db->delete('members_session', array('user_id', '=', $this->data()->id));
			Session::delete($this->_sessionName);
		}
		public function data() {
			
			return $this->_data;
		}
		
		public function isLoggedIn() {
			
			return $this->_isLoggedIn;
		}
	}
