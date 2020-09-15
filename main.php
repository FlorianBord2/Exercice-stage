
<!DOCTYPE html>
<html>
<body>


<?php
$dir    = 'file/';
$scanned_directory = array_diff(scandir($dir), array('..', '.'));

foreach ($scanned_directory as $file){
	$file_parts = pathinfo($file);
	switch($file_parts['extension'])
	{
		case "csv":
		echo '<form method="get" action="view.php">
		<label for="file">'.$file.'</label>
		<input type="hidden" value="'.$file.'"id="fname" name="filename">
		<input type="submit" value="Répartition"></form>';
		echo '<form methode="get" action="table.php">
		<input type="hidden" value="'.$file.'"id="fname" name="filename">
		<input type="submit" value="Tableau"></form>
		<br>';
		break;

		case "": // Handle file extension for files ending in '.'
		case NULL: // Handle no file extension
		break;
	}
}
?>


</body>
</html>
