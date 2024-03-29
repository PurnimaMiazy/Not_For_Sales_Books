<?php
  include "connec.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}
		
		body {
  background-color: #6db6b9e6;
 
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}
#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.book
{
    width: 400px;
    margin: 0px auto;
}
.form-control
{
  background-color: #080707;
  color: white;
  height: 40px;
}

	</style>
		
</head>
<body>
	
<div >

  <div class="container" style="text-align: center;">
    <h2 style="color:black; font-family: Lucida Console; text-align: center"><b>FOUNDATION'S  INFORMATION</b></h2>
    <h2 style="color:black; font-family: Lucida Console; text-align: center"><b>Please enter your book ID in which you want to add fund</b></h2>
    <form class="book" action="" method="post">
        
        <input type="text" name="book_id" class="form-control" placeholder="Enter Your Required Book ID"><br>
        
        <button style="text-align: center;" class="btn btn-default" type="submit" name="submit">Enter</button><br> <br>
		<button style="text-align: center;" class="btn btn-default" type="submit" name="submit2">Customer details who didn't return book in time</button><br> <br>
		<button style="text-align: center;" class="btn btn-default" type="submit" name="submit3">Owner info who did'nt give fund's money</button><br> <br>
    </form>
  </div>
<?php
    if(isset($_POST['submit']))
    {
		 mysqli_query($db,"UPDATE  owner_details set status='Paid' where owner_id=(select owner_id from book_details where book_id='$_POST[book_id]');");
		 mysqli_query($db,"UPDATE  bill_details set fund=10 where bill_no=(select bill_no from bill_details where book_id='$_POST[book_id]');");
		echo "Available amount of tk saved in fund is.";
		echo "<table class='table table-bordered table-hover' border=2>";
		
			echo "<tr style='background-color: #6db6b9e6;'>";
				echo "<th>"; echo "Total Amount";  echo "</th>";
				
				
			echo "</tr>";	
		$q=mysqli_query($db,"SELECT sum(fund) as total_fund from bill_details ;");
			while($row=mysqli_fetch_assoc($q))
			{
				
				echo "<tr>";
				
				echo "<td>"; echo $row['total_fund']; echo "</td>";
				
				echo "</tr>";
			}
		echo "</table>";
    }
		if(isset($_POST['submit2']))
		{
			$q=mysqli_query($db,"SELECT customer_name,phone_no from bill_details NATURAL JOIN customer_details where return_date<back_date ;");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No customer found.";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				//Table header
				
				echo "<th>"; echo "Member-Name";  echo "</th>";
				
				echo "<th>"; echo "Phone Number";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				
				echo "<tr>";
				
				echo "<td>"; echo $row['customer_name']; echo "</td>";
				
				echo "<td>"; echo $row['phone_no']; echo "</td>";
				
				echo "</tr>";
			}
		echo "</table>";
			}
		}
	if(isset($_POST['submit3']))
		{
			$q=mysqli_query($db,"SELECT owner_name,phone_no from owner_details  where status='Returned' ;");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No owner found.";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				//Table header
				
				echo "<th>"; echo "Owner-Name";  echo "</th>";
				
				echo "<th>"; echo "Phone Number";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				
				echo "<tr>";
				
				echo "<td>"; echo $row['owner_name']; echo "</td>";
				
				echo "<td>"; echo $row['phone_no']; echo "</td>";
				
				echo "</tr>";
			}
		echo "</table>";
			}
		}
	
	
?>
</div>


</body>