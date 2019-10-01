<html>
<style>

	body { background: url(coffeecandy3.jpg); }

	td { text-align: center; }

	article
	{
	    background-color: chocolate;
		margin-left: 100px;
		margin-right: 100px;
		border-radius: 4px;
	    opacity: 0.9;
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
		height: 550px;
	}

</style>
<head>
	<title>Update Order</title>
</head>
	<body>
		<?php 

			session_start();
			include 'dbconnect.php';

			$sql = "SELECT  *
					FROM 	cookieorder a, customer b, cookie c
					WHERE 	a.email = b.email
					AND		a.cookieID = c.cookieID
					ORDER BY a.ddate";

			$retval = mysqli_query($con, $sql);
					   
			if(!$retval ) { die('Could not get data: ' . mysqli_error()); }

			echo"	<article>";
			print'	<div class="scrollit">
					<center><input type="text" id="input" onkeyup="myFunction()" style="width:60%" placeholder="Search for order status" title="Type in an order status">
					</center>
					<table id="table" style="width:100%">
						<tr style="background-color:brown">
							<th>Customer Email</th>
							<th>Delivery Date</th>
							<th>Cookie Type</th>
							<th>Cookie Price (RM</th>
							<th>Total Cookies</th>
							<th>Total Price (RM)</th>
							<th>Order Status</th>
							<th>Action</th>
							<th>Checked By</th>
							<th>Completed By</th>
						</tr>';

			while($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
			{
				$email 		= $row['email'];
				$date 		= $row['ddate'];
				$cookieID 	= $row['cookieType'];
				$cookiePrice= $row['cookiePrice'];
				$totCookies = $row['totCookies'];
				$totCookies = $row['totCookies'];
				$orderStat	= $row['orderStat'];
				$orderID	= $row['orderID'];
				$approvedBy	= $row['approvedBy'];
				$completedBy= $row['completedBy'];
							
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
					echo"	<form action='updateStatus.php' method='post'> 
							<td><input type='Submit' name='Approved' value='Approve'>
							<input type='Submit' name='Reject' value='Reject'></td>" ?>
							<?php $_SESSION['orderID'] = $orderID;
					echo"	</form>
							<td>-------</td>
							<td>-------</td>";
				}

				else if($orderStat == 'Approved')
				{
					echo"	<form action='updateStatus.php' method='post'>
							<td><input type='Submit' name='Completed' value='Completed'></td>" ?>
							<?php $_SESSION['orderID'] = $orderID;
					echo"	</form>
							<td>{$row['approvedBy']}</td>
							<td>-------</td>";
				}

				else if($orderStat == 'Rejected')
				{
					echo"	<td>{$row['approvedBy']}</td>
							<td>-------</td>";
				}

				else if($orderStat == 'Completed')
				{
					echo"	<td>-------</td>
							<td>{$row['approvedBy']}</td>
							<td>{$row['completedBy']}</td>";
				}

				echo"		</tr>";
			}

			echo "</table>";
			echo "</article>";
							
			mysqli_close($con);
		?>

		<center><a href="bakerPage.php" style="position:relative;color:white;"><button>Home</button></a></center>
		<script>
		function myFunction() {
		  var input, filter, table, tr, td, i;
		  input = document.getElementById("input");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("table");
		  tr = table.getElementsByTagName("tr");
		  for (i = 0; i < tr.length; i++) {
		    td = tr[i].getElementsByTagName("td")[6];
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