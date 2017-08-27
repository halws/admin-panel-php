<?php 

	function html($text)
	{
		return htmlspecialchars($text,ENT_QUOTES,
			'UTF-8');
	}
	function htmlout($text){
		echo html($text);
	}
	function error($e)
	{
			echo("  Error " . $e->getMessage());
	}
	function rootD()
	{
		$dir = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);
		return $dir.'/php/admin-panel';
	}
 ?>