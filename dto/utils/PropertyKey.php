<?php
	class PropertyKey {
		private $key;
		private $option;
		public static $OPTIONNAL = "OPTIONNAL";
		public static $MANDATORY = "MANDATORY";
		private static $instance;

		function __construct($key, $option) {
			$this->key=$key;
			$this->option=$option;
		}

		public function getKey() {
			return $this->key;
		}
		public function getOption() {
			return $this->option;
		}

	}