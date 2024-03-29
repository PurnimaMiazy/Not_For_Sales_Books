<?php
  include "connec.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Know Bill number</title>
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
    <h2 style="color:black; font-family: Lucida Console; text-align: center"><b>Know bill number</b></h2>
    <h2 style="color:black; font-family: Lucida Console; text-align: center"><b>Please enter your book ID</b></h2>
    <form class="book" action="" method="post">
        
        <input type="text" name="book_id" class="form-control" placeholder="Enter Your Required Book ID" required=""><br>
        
        <button style="text-align: center;" class="btn btn-default" type="submit" name="submit">Enter</button><br><br>
		<a href="own-ret.php"><font size="5" color="black"><mark>Return</mark></font></a>
    </form>
  </div>
<?php
   
if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT bill_no,book_id from bill_details where book_id like '%$_POST[book_id]%' ");

				if(mysqli_num_rows($q)==0)
				{
					echo "Sorry! No book found. Try searching again.";
				}
				else
				{
					echo "<table class='table table-bordered table-hover' >";
					echo "<tr style='background-color: #5BF8FA;'>";
					echo "<th>"; echo "ID";	echo "</th>";
					echo "<th>"; echo "Bill Number";  echo "</th>";
					echo "</tr>";	

					while($row=mysqli_fetch_assoc($q))
					{
				
						echo "<tr>";
						echo "<td>"; echo $row['book_id']; echo "</td>";	
						echo "<td>"; echo $row['bill_no']; echo "</td>";

						echo "</tr>";
					}
					echo "</table>";
				}
		}

		

?>

</div>


</body>