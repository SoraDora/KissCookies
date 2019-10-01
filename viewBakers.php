<!DOCTYPE html>
<html>
<style>
	
	body { background: url(coffeecandy3.jpg); }

	td { text-align: center; }

	button
	{
	    background-color: black;
	    color: white;
	    padding: 14px 20px;
	    border: 5px solid #8B4513;
	    cursor: pointer;
	}

	article
	{
	    background-color: chocolate;
		margin-left: 100px;
		margin-right: 100px;
		border-radius: 4px;
	    opacity:0.9;
	    padding: 0.5em;
	    overflow: hidden;
	}

	.scrollit
	{
		overflow-y: auto;
		overflow-x: hidden;
		height:550px;
	}
	
</style>
<head>
	<title>View Bakers</title>
</head>
	<body>
		<?php

			session_start();
			include 'dbconnect.php';
							
			$sql = "SELECT * FROM baker";

			$retval = mysqli_query($con, $sql);

			if(!$retval) { die('Could not get data: ' . mysql_error()); }

			echo'	<br><article>
					<div class="scrollit">
					<center><input type="text" id="input" onkeyup="myFunction()" style="width:60%" placeholder="Search for baker" title="Type in a baker name">
					</center>
					<table id="table" style="width:100%;">
						<tr style="background-color:brown">
							<th>Baker ID</th>
							<th>Baker Name</th>
							<th>Baker Phone</th>
						</tr>';
							
			while($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
			{
				$bakerID 	= $row['bakerID'];
				$bakerName 	= $row['bakerName'];
				$bakerPhone = $row['bakerPhone'];
							
				print"	<tr>
							<td>{$row['bakerID']}</td>
							<td>{$row['bakerName']}</td>
							<td>{$row['bakerPhone']}</td>
						</tr>";
			}

			echo "</table></article>";
			mysqli_close($con);
		?>
	<center><a href="bakerPage.php" style="position:absolute;bottom:5%;left:47%;color:white;"><button>Home</button></a></center>
	
	<script>
		function myFunction() {
		  var input, filter, table, tr, td, i;
		  input = document.getElementById("input");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("table");
		  tr = table.getElementsByTagName("tr");
		  for (i = 0; i < tr.length; i++) {
		    td = tr[i].getElementsByTagName("td")[1];
		    if (td) {
		      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
		        tr[i].style.display = "";
		      } else {
		        tr[i].style.display = "none";
		      }
		    }       
		  }
		}
		</script>
	</body>
</html>