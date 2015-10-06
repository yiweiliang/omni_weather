<!DOCTYPE html>
<html>
<head>
	<title> Response Page</title>
	<link rel="stylesheet" href="stylesheets/app.css" />
	<link rel="stylesheet" type="text/css" href="weather.css">
</head>
<body>
<div class="small-6 large-8 column" id="container-sun">
<svg class="svg-sun" version="1.1" viewBox="0 0 100 100" preserveAspectRatio="xMinYMin meet">
<circle cx="50" cy="50" r="35" id="sun"></circle>
</svg>
</div>

<div class="small-6 large-8 column">
<?php
	if (isset($_GET['city']) ) {
		$open_url = 'http://api.openweathermap.org/data/2.5/weather?';	
		$open_id = '2b38602d8c6ac06babab303acc148081';
		
		$open_urll = $open_url .'q='. $_GET['city']. '&APPID=' . $open_id . '&units=metric';
		$open_results = file_get_contents($open_urll);
		$object = json_decode($open_results);
		$temp =$object->main->temp;
        $condition=$object->weather[0]->description;
		  $html  = "'<div class='weather'><h3>The Weather for &nbsp</h3> " . "<h2>".$object->name . "</h2>" . " now is " . $temp . "&deg and the weather condition is: " . $condition; 
		echo $html . "</div>"; 	
	}
	else{
		echo "error";	
	}
	?>
</div>

</body>
</html>
