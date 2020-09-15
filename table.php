<?php

include 'utils.php';

if (isset($_GET['filename'])){
	$name = $_GET['filename'];
	if (empty($name)) {
		//echo "Error with the file";
		$name = 'data_csv.csv';
		} else {
		//echo $name;
		}
		// Open and read file
	session_start();
	$name = 'file/'.$name;
	$csv = file_get_contents($name);

	//Remove special caracter
	$csv = iconv('utf-8','ASCII//IGNORE//TRANSLIT',$csv);

	//convert csv
	$array = array_map("str_getcsv", explode("\n", $csv));

	//Get the column name
	$labels = array_shift($array);
	$_SESSION["array"] = $array;
	$_SESSION["labels"] = $labels;
	echo disp_tab($labels, $array);
}
?>