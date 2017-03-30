<!DOCTYPE html>
<html>
<head>
	<title>Team Information</title>
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

	<h1><p class="serif" align="center">Teams Information</p></h1>

	<form name="frmMain" method="POST" action="inforFL1.php" align="center">
	Select teams
		<select name="team_infor">
			<a><option value="20">All</option></a>
			<a><option value="0">SC Bastia</option></a>
			<a><option value="1">Paris Saint-Germain</option></a>
			<a><option value="2">AS Monaco FC</option></a>
			<a><option value="3">EA Guingamp</option></a>
			<a><option value="4">FC Girondins de Bordeaux</option></a>
			<a><option value="5">AS Saint-Étienne</option></a>
			<a><option value="6">SM Caen</option></a>
			<a><option value="7">FC Lorient</option></a>
			<a><option value="8">Dijon FCO</option></a>
			<a><option value="9">FC Nantes</option></a>
			<a><option value="10">FC Metz</option></a>
			<a><option value="11">OSC Lille</option></a>
			<a><option value="12">Montpellier Hérault SC</option></a>
			<a><option value="13">Angers SCO</option></a>
			<a><option value="14">AS Nancy</option></a>
			<a><option value="15">Olympique Lyonnais</option></a>
			<a><option value="16">OGC Nice</option></a>
			<a><option value="17">Stade Rennais FC</option></a>
			<a><option value="18">Olympique de Marseille</option></a>
			<a><option value="19">Toulouse FC</option></a>
		</select>

		&nbsp&nbsp<input type="submit" name="select" value="Submit">
	</form><br><br>
<?php
	error_reporting(0);
	$select = $_POST['team_infor'];
    $uri = 'http://api.football-data.org/v1/competitions/434/teams';
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token: 4db8a6f1d542421c93b0afbbd26af418';
    $stream_context = stream_context_create($reqPrefs);
    $response = file_get_contents($uri, false, $stream_context);
    $fixtures = json_decode($response,true);
?>

	<table align="center">
		<tr align="center">
			<th>Picture</th>
			<th>Team</th>
			<th>ShortName</th>
			<th>MarketValue</th>
		</tr>
<?php
		error_reporting(0);
		//$key = "teams";
		foreach ($fixtures as $key => $value) {
			if($key == "teams"){
				$teams[$key] = $value[$select]['name'];
				$name[$key] = $value[$select]['shortName'];
				$market[$key] = $value[$select]['squadMarketValue'];
				$picture[$key] = $value[$select]['crestUrl'];

				if($select == "20"){
					for ($i=0; $i < 20; $i++) { 
						if($key == "teams"){
							$teams[$key] = $value[$i]['name'];
							$name[$key] = $value[$i]['shortName'];
							$market[$key] = $value[$i]['squadMarketValue'];
							$picture[$key] = $value[$i]['crestUrl'];
						
?>
						<tr align="center">
							<td><?php echo "<img style='width:50px;' src='".$picture[$key]."'/>&nbsp;";?></td>
							<td><?php echo $teams[$key];?></td>
							<td><?php echo $name[$key];?></td>
							<td><?php echo $market[$key];?></td>
						</tr>
<?php
						}
					}
				}else{
?>


		<tr align="center">
			<td><?php echo "<img style='width:100px;' src='".$picture[$key]."'/>&nbsp;";?></td>
			<td><?php echo $teams[$key];?></td>
			<td><?php echo $name[$key];?></td>
			<td><?php echo $market[$key];?></td>
		</tr>
<?php
				}
			}
		}
?>
</table>
</body>