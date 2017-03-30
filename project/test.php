<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Football News</title>
	<link rel="stylesheet" type="text/css" href="css/menu.css">
</head>

<body align="margin-left">
	<ul>
	  <li><a class="active" href="test.php">Home</a></li>
	  <li class="dropdown">
	    <a href="javascript:void(0)" class="dropbtn">Table</a>
	    <div class="dropdown-content">
	      <a href="tablePL.php">Premier league 2016/2017</a>
	      <a href="tableBL.php">Bundesliga 2016/2017</a>
	      <a href="tableFL1.php">Ligue 1 2016/17</a>
	      <a href="tableSA.php">Serie A 2016/17</a>
	    </div>
	  </li>

	  <li  class="dropdown">
	  	<a href="javascript:void(0)" class="dropbtn">Information</a>
	    <div class="dropdown-content">
	      <a href="inforPL.php">Premier league 2016/2017</a>
	      <a href="inforBL.php">Bundesliga 2016/2017</a>
	      <a href="inforFL1.php">Ligue 1 2016/17</a>
	      <a href="inforSA.php">Serie A 2016/17</a>
	    </div>
	  </li>
	</ul>

	<h1><p class="serif" align="center">Football News</p></h1>
	<?php

	    $uri = 'https://newsapi.org/v1/articles?source=four-four-two&sortBy=top';
	    $reqPrefs['http']['method'] = 'GET';
	    $reqPrefs['http']['header'] = 'X-Api-Key : ef62f36ab4a1426e8bf234af21f9244f';
	    $stream_context = stream_context_create($reqPrefs);
	    $response = file_get_contents($uri, false, $stream_context);
	    $fixtures = json_decode($response,true);

	?>

	<div class="menu">
		<table>
			<tr>
				<th>Hightlight Football</th>
			</tr>
			<tr>
				<td>
					<p>Best Goals of the Month - March 2017 ● HD</p>
					<embed width="800" height="400" src="https://www.youtube.com/v/rc9ejEBPjyE">
				</td>
			</tr>
			<tr>
				<td>
					<p>Football Skills Mix 2017 - Neymar ● Ronaldo ● Messi ● Quaresma ● Griezmann ● Hazard</p>
					<embed width="800" height="400" src="https://www.youtube.com/v/Xgjkd5mEfeQ">
				</td>
			</tr>
		</table>	
	</div>

	<div class="main">
	<table>
		<tr>
			<th>Top News</th>
			<th></th>
		</tr>
	<?php
		error_reporting(0);
		foreach ($fixtures as $key => $row){
			if($key == "articles"){
				//echo $key."<br>";
				for($i=0;$i<10;$i++){
					$picture[$key] = $row[$i]['urlToImage'];
					$title[$key] = $row[$i]['title'];
					$des[$key] = $row[$i]['description'];
					$url[$key] = $row[$i]['url'];

				//echo $row[0]['author'];
				//echo $row['title'];
	?>
			<tr>
				<td><?php echo "<img style='width:200px;' src='".$picture[$key]."'/>&nbsp;";?></td>
				<td>
				<?php echo $title[$key];?><br><br>
				<?php echo '<A HREF = "'.$url[$key].'" target="_blank">Readmore</A>'?>
					
				</td>
			</tr>
	<?php
				}
			}	
		}
	?>
	</div>
</body>
</html>