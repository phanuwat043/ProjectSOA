<!DOCTYPE html>
<html>
<head>
	<title>Table</title>
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	
</head>

<body>
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
	
	<h1><p class="serif" align="center">Serie A Table</p></h1>
<?php
    $uri = 'http://api.football-data.org/v1/competitions/438/leagueTable';
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token: 4db8a6f1d542421c93b0afbbd26af418';
    $stream_context = stream_context_create($reqPrefs);
    $response = file_get_contents($uri, false, $stream_context);
    $fixtures = json_decode($response,true);
?>

	<table align="center">
		<tr align="center">
			<th>No.</th>
			<th>Picture</th>
			<th>Team</th>
			<th>Playgames</th>
			<th>Wins</th>
			<th>Draws</th>
			<th>Losses</th>
			<th>Goals</th>
			<th>Against</th>
			<th>+/-</th>
			<th>Points</th>
		</tr>
<?php
		error_reporting(0);
		foreach ($fixtures as $key => $row) {
			if($key == "standing"){
				for ($i=0; $i < 20; $i++) { 
					$position[$key] = $row[$i]['position'];
					$pic[$key] = $row[$i]['crestURI'];
					$team[$key] = $row[$i]['teamName'];
					$play[$key] = $row[$i]['playedGames'];
					$win[$key] = $row[$i]['wins'];
					$draws[$key] = $row[$i]['draws'];
					$Losses[$key] = $row[$i]['losses'];
					$goal[$key] = $row[$i]['goals'];
					$goalA[$key] = $row[$i]['goalsAgainst'];
					$goalD[$key] = $row[$i]['goalDifference'];
					$point[$key] = $row[$i]['points'];
?>
		<tr align="center">
			<td><?php echo $position[$key];?></td>
			<td><?php echo "<img style='width:25px;' src='".$pic[$key]."'/>&nbsp;";?></td>
			<td><?php echo $team[$key];?></td>
			<td><?php echo $play[$key];?></td>
			<td><?php echo $win[$key];?></td>
			<td><?php echo $draws[$key];?></td>
			<td><?php echo $Losses[$key];?></td>
			<td><?php echo $goal[$key];?></td>
			<td><?php echo $goalA[$key];?></td>
			<td><?php echo $goalD[$key];?></td>
			<td><?php echo $point[$key];?></td>
		</tr>
<?php
				}
			}
		}
?>
</table>
</body>