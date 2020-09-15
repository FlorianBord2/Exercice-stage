<?php

	include 'html.php';

	function count_many($array){
		foreach ($array as $elem){
		print_r($elem);
	}
		return $res;
	}

	//Give the number of type found. Exemple, number of "armoire"
	function how_many_needed($arr,$needed) {
		$arr2 = array();
		if(!is_array($arr['0'])){
			$arr=array($arr);
		}
		foreach($arr as $k=> $v){
			foreach($v as $v2){
				if(in_array($v2, $needed)){
					if(!isset($arr2[$v2])){
						$arr2[$v2] = 1;
					} else {
						$arr2[$v2]++;
					}
				}
			}
		}
		return $arr2;
	}

	//Give all the differant value for a key. Exemple, give all zone name. Or all type name
	function how_many_diftype($arr,$needed,$lower=true) {
		$arr2 = array();
		if(!is_array($arr['0'])){
			$arr=array($arr);
		}
		foreach($arr as $v){
			if(in_array($v[$needed], $arr2)){
			}else{
				array_push($arr2, $v[$needed]);
			}
		}
		return $arr2;
	}

	//Transform my arrays in charts array
	function format_array($array){
		$new_arr = array();
		foreach($array as $arr=> $key){
			array_push($new_arr,  array("label"=>$arr, "y"=>$key));
		}
		return $new_arr;
	}

	//Give the html/js code of the chart
	function create_charts($title, $subtitle, $array){
		$arr = format_array($array);
		$chart = html_chart($title, $subtitle,$arr);
		return $chart;
	}
?>