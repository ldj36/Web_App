<?php

	class Headers {
		var $get = array();
		var $post = array();
		
		function __construct() {
			$this->get = $_GET;
			$this->post = $_POST;
		}
		
		function GET($name) {
			if($this->get[$name]) return $this->get[$name];
			return false;
		}
		
		function POST($name) {
			if($this->post[$name]) return $this->post[$name];
			return false;
		}
		
		function PostField($name) {
			$a = $this->POST($name);
			if($a === false) return '';
			return $a;
		}
		
		function GetField($name) {
			$a = $this->GET($name);
			if($a === false) return '';
			return $a;
		}
	}

?>