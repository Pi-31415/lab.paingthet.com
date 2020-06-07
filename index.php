<?php
require 'Parsedown.php';
header("Access-Control-Allow-Origin: *");
$dir = "./";

// Sort in ascending order - this is default
$dirarray = scandir($dir);

$Parsedown = new Parsedown();

foreach ($dirarray as $experiment) {
	if($experiment == "." || $experiment == ".." || $experiment == "index.php" || $experiment == 'Parsedown.php' ){
		//do nothing if the directories are these
	}
	else{
		//display info from readme
		if(file_exists("./$experiment/README.md")){
			$text = $Parsedown->text(file_get_contents("./$experiment/README.md"));
			echo str_replace("h1","h5",$text);
			echo "<a href='http://lab.paingthet.com/$experiment' target='_blank'>See \"$experiment\" Experiment</a> <br>";
		}else{
			echo "<h5>$experiment</h5><a href='http://lab.paingthet.com/$experiment' target='_blank'>See \"$experiment\" Experiment</a> <br>";
		}
		echo "<hr>";
	}
  
}
?>
<br>
