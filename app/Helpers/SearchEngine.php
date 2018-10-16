<?php 

class myFunctionCustomer {
	public function strToSearch($key, $str, $loca)
	{	$str2 = '';
	$c_keyword = str_word_count($key);
	$c_str = str_word_count($str);
	$str1 = preg_split("/[\s,.]+/", $str);
	for($i = 0; $i< $c_keyword; $i++) {
		$str2 = $str2." ".$str1[$local + $i];
	}
	return $str2;
}
public function Search($key, $str)
{
	$c_keyword = str_word_count($key);
	$c_str = str_word_count($str);
	$str1 = preg_split("/[\s,.]+/", $str);
	for($i = 0; $i< $c_str; ) {

	}
}

}
?>