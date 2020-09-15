<?php
include 'utils.php';

//This script show the differant label you can graph
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

	//print_r( $array);
	//Get the column name
	$labels = array_shift($array);
	$_SESSION["array"] = $array;
	$_SESSION["labels"] = $labels;

	//print_r($labels);
	echo disp_label($labels,$array);
}


if(!isset($_GET['filename'])){
	session_start();
	$array = ($_SESSION["array"]);
	$labels = ($_SESSION["labels"]);

	$i = 0;
	foreach($labels as $label){
		if(in_array($label,$_GET)){
			$nb_type = how_many_diftype($array,$i);
			$nb_of_type = how_many_needed($array, $nb_type);
			echo '<br>';
			echo create_charts($label, $label, $nb_of_type);
		}
		$i++;
	}
}

?>
