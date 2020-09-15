<?php
	function html_chart($title, $subtitle ,$dataPoints){
		return '<!DOCTYPE HTML>
		<html>
		<head></form><br><form action="main.php"><input type=submit value="Home"></form>
		<script>
		window.onload = function() {
		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			title: {
				text: "'.$title.'"
			},
			subtitles: [{
				text: "'.$subtitle.'"
			}],
			data: [{
				type: "pie",
				yValueFormatString: "#,##0.00\"%\"",
				indexLabel: "{label} ({y})",
				dataPoints:'.json_encode($dataPoints, JSON_NUMERIC_CHECK).'
			}]
		});
		chart.render();
		}
		</script>
		</head>
		<body>
		<div id="chartContainer" style="height: 370px; width: 100%;"></div>
		<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
		</body>
		</html>';
	};

	function disp_label($labels,$array){
		$res = '<form method=get>';
		foreach($labels as $label => $key){
			$res = $res.'<input type="submit" id="'.$key.'" name="'.$key.'" value="'.$key.'">
			<label name="chart" for="'.$key.'"> ('.count(how_many_diftype($array,$label)).')</label><br>';
		}
		$res = $res.'</form><br><form action="main.php"><input type=submit value="Home"></form>';
		return $res;
	}

	function disp_tab($labels, $array){
		$script = '<meta charset="utf-8"><script src="https://www.w3schools.com/lib/w3.js"></script>';
		$home = '<form action="main.php"><input type=submit value="Home">';
		$begin = '</form><br></form><table id="myTable"><thead><thead><tbody>';
		$body = '<tr>';
		//Name of column
		$i = 1;
		foreach($labels as $label){
			$body = $body.'<th onclick="w3.sortHTML(\'#myTable\',\'.item\', \'td:nth-child('.$i.')\')">'.$label.'</td>';
			$i++;
		}
		foreach($array as $elem){
			$body = $body.'<tr class="item">';
			foreach($elem as $line){
				$body = $body.'<td>'.$line.'</td>';
			}
			$body = $body.'</tr>';
		}
		$end = '</tbody></table>';
		$html = $script.$home.$begin.$body.$end;
		return $html;
	}
?>