
<html>
	<body>
		<?php
file_put_contents("log.txt", "got to jump level");
			function sanitize($data) {
			  /*$data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);*/
			  return $data;
			}
			$jumpLevel = sanitize($_POST["jumpLevel"]);
			file_put_contents("log.txt", "got to jump level");
			$HA = sanitize($_POST["HA"]);
			//file_put_contents("Got to HA", 3, "log.txt");
			$HAM = sanitize($_POST["HAM"]);
			//file_put_contents("Got to HAM", 3, "log.txt");
			$CA = sanitize($_POST["CA"]);
			//file_put_contents("Got to CA", 3, "log.txt");
			$CAM = sanitize($_POST["CAM"]);
			//file_put_contents("Got to CAM", 3, "log.txt");
			$HT = sanitize($_POST["HT"]);
			//file_put_contents("Got to HT", 3, "log.txt");
			$HTM = sanitize($_POST["HTM"]);
			//file_put_contents("Got to HTM", 3, "log.txt");
			$CT = sanitize($_POST["CT"]);
			//file_put_contents("Got to CT", 3, "log.txt");
			$CTM = sanitize($_POST["CTM"]);
			//file_put_contents("Got to CTM", 3, "log.txt");
			if (!empty($_POST["highCargo"])) {
				$highCargo = "true";
			} else {
				$highCargo = "false";
			}
			//file_put_contents("Got to highCargo", 3, "log.txt");
			if (!empty($_POST["highHatch"])) {
				$highHatch = "true";
			} else {
				$highHatch = "false";
			}
			//file_put_contents("Got to highHatch", 3, "log.txt");
			$timeOnDefense = sanitize($_POST["timeOnDefense"]);
			//file_put_contents("Got to timeOnDefense", 3, "log.txt");
			$timeOnBot1 = sanitize($_POST["timeOnBot1"]);
			//file_put_contents("Got to timeOnBot1", 3, "log.txt");
			$timeOnBot2 = sanitize($_POST["timeOnBot2"]);
			//file_put_contents("Got to timeOnBot2", 3, "log.txt");
			$timeOnBot3 = sanitize($_POST["timeOnBot3"]);
			//file_put_contents("Got to timeOnBot3", 3, "log.txt");
			$climbLevel = sanitize($_POST["climbLevel"]);
			//file_put_contents("Got to climbLevel", 3, "log.txt");
			$timeBroke = sanitize($_POST["timeBroke"]);
			//file_put_contents("Got to timeBroke", 3, "log.txt");
			$climbAssistCount = sanitize($_POST["climbAssistCount"]);
			if (!empty($_POST["mechanicalIssues"])) {
				$mechanicalIssues = "true";
			} else {
				$mechanicalIssues = "false";
			}
			if (!empty($_POST["connectionIssues"])) {
				$connectionIssues = "true";
			} else {
				$connectionIssues = "false";
			}
			$position = sanitize($_POST["position"]);
			$teamNumber = sanitize($_POST["teamNumber"]);
			$matchNumber = sanitize($_POST["matchNumber"]);
			$setNumber = sanitize($_POST["setNumber"]);
			$compLevel = sanitize($_POST["compLevel"]); //qm, ef, qf, sf, f
			$notes = sanitize($_POST["notes"]);
			$offensivePenalties = sanitize($_POST["offensivePenalties"]);
			$defensivePenalties = sanitize($_POST["defensivePenalties"]);



			$password = getenv("DBPASS");
			$database = new mysqli("localhost", "pi", $password, "scout_janssen");

			if ($database->connect_error) {
				die("Connection to database failed" . $conn->connect_error);
			}

			$query = "INSERT INTO reports (jumpLevel, HA, CA, HT, CT, highCargo, highHatch, timeOnDefense, timeOnBot1, timeOnBot2, timeOnBot3, climbLevel, timeBroke, mechanicalIssues, connectionIssues, position, teamNumber, matchNumber, setNumber, compLevel, notes, offensivePenalties, defensivePenalties, HAM, CAM, HTM, CTM, climbAssistCount)
			VALUES (" . $jumpLevel .", " . $HA . ", " . $CA . ", " . $HT . ", " . $CT . ", '" . $highCargo . "', '" . $highHatch . "', " . $timeOnDefense . ", " . $timeOnBot1 . ", " . $timeOnBot2 . ", " . $timeOnBot3 . ", " . $climbLevel . ", " . $timeBroke . ", '" . $mechanicalIssues . "', '" . $connectionIssues . "', " . $position . ", " . $teamNumber . ", " . $matchNumber . ", " . $setNumber . ", '" . $compLevel . "', '" . $notes . "', " . $offensivePenalties . ", " . $defensivePenalties . ", " . $HAM . ", " . $CAM . ", " . $HTM . ", " . $CTM . ", " . $climbAssistCount . ");";
			
			echo($query);
			try {
				$database->query($query);
			} catch (Exception $e) {
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
			echo("hi");
		?>
	</body>
</html>