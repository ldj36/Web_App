<?php
	class Document {
		var $attributes = array();
		
		function setAttribute($name, $value) {
			$this->attributes[$name] = $value;
			return true;
		}
		
		function getAttribute($name) {
			if(!$this->attributes[$name]) return false;
			return $this->attributes[$name];
		}
		function get($name) {
			return $this->getAttribute($name);
		}
	}
?>