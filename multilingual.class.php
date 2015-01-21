<?php
/*
Usage:
$m = new Multilingual('hu',array('hu'=>'hu.ini','en'=>'en.ini'));
*/
class Multilingual {
	protected $languages;
	protected $language_file;

	function __construct($selected_language,$languages){
		$this->languages = $languages;
		$this->language_file = (in_array($selected_language,array_keys($languages)))?$this->languages[$selected_language]:reset($this->languages);
		ob_start(array($this,'translate'));
	}
	
	function translate($buffer){
		$language_data = parse_ini_file($this->language_file);
		return (str_replace(array_keys($language_data),array_values($language_data), $buffer));
	}
}
?>