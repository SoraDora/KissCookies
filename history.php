<style>

	body { background: url(coffeecandy3.jpg);}

	td { text-align: center; }

	header
	{
		border-radius: 4px;
		padding-top: 1em;
	    color: black;
		font-size: 25px;
		font-weight:bold;
	    clear: left;
	    text-align: left;
		float: left;
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

	button
	{
	    background-color: black;
	    color: white;
	    padding: 14px 20px;
	    border: 5px solid #8B4513;
	    cursor: pointer;
	}

	.scrollit
	{
		overflow-y: auto;
		overflow-x: hidden;
		height:550px;
	}

</style>
<html>
	<head>
		<title>History Transactions</title>
	</head>
	<body>
		<?php
			session_start();
			include 'dbconnect.php';

			$email = $_SESSION['email'];
						
			$sql = "SELECT *
					FROM cookieorder a, customer b, cookie c
					WHERE a.email = b.email
					AND a.cookieID = c.cookieID
					AND a.email = '$email'
					ORDER BY a.ddate";

			$retval = mysqli_query($con, $sql);

			if(!$retval) { die('Could not get data: ' . mysql_error()); }

			echo'	<br><article>
					<div class="scrollit">
					<center><input type="text" id="input" onkeyup="myFunction()" style="width:60%" placeholder="Search for cookie type" title="Type in a cookie type">
					</center>
					<table id="table" style="width:100%;">
						<tr style="background-color:brown">
							<th>Email</th>
							<th>Delivery Date</th>
							<th>Cookie Type</th>
							<th>Cookie Price (RM)</th>
							<th>Total Cookies</th>
							<th>Total Price (RM)</th>
							<th>Order Status</th>
							<th>Action</th>
						</tr>';
						
			while($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
			{
				$email 		= $row['email'];
				$date 		= $row['ddate'];
				$cookieType = $row['cookieType'];
				$cookiePrice= $row['cookiePrice'];
				$totCookies = $row['totCookies'];
				$totPrice 	= $row['totPrice'];
				$orderStat 	= $row['orderStat'];
				$orderID	= $row['orderID'];
						
				print"	<tr>
							<td>{$row['email']}</td>
							<td>{$row['ddate']}</td>
							<td>{$row['cookieType']}</td>
							<td>{$row['cookiePrice']}</td>
							<td>{$row['totCookies']}</td>
							<td>{$row['totPrice']}</td>
							<td>{$row['orderStat']}</td>";

				if($orderStat == 'Pending')
				{ 
					echo"	<form action='updateHistory.php' method='post'> 
							<input type='Submit' name='Delete' value='Delete'>" ?>
							<?php $_SESSION['orderID'] = $orderID;
					echo"	</form>";
				}

				else { echo '<td>--------</td>';}
			}

			echo'	</table></article>';
			mysqli_close($con);
		?>
		<center><a href="loginPage.php" style="position:absolute;bottom:5%;left:45%;color:white;"><button>Home</button></a></center>

		<script>
		function myFunction() {
		  var input, filter, table, tr, td, i;
		  input = document.getElementById("input");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("table");
		  tr = table.getElementsByTagName("tr");
		  for (i = 0; i < tr.length; i++) {
		    td = tr[i].getElementsByTagName("td")[2];
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