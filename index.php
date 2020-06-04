<p>Welcome to Pi's laboratory !</p>

<p>Here lies his finished and ongoing, simple and complex, useful and useless experiments / tools-under-development, with code, computers, interactive media, with inspiration from everywhere.</p>

<p>This page automatically updates as Pi carry out his coding experiments. Therefore, what you see now is what he is doing now.</p>

<div style="color:white;background-color: #ef5350;padding:10px;border-radius: 5px;">Note: Some of the experiments may require running on HTTPS protocol. If they are not working, simply replace the <i>http</i> in the URL with <i>https</i>.</div>
<br>
<h4>Experiments</h4>
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
