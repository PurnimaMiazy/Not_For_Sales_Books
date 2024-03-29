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
    <h2 style="color:black; font-family: Lucida Console; text-align: center"><b>Return Books</b></h2>
    <h2 style="color:black; font-family: Lucida Console; text-align: center"><b>Please enter your returned book ID from book list to know the owner info of the book</b></h2>
    <form class="book" action="" method="post">
        
        <input type="text" name="book_id" class="form-control" placeholder="Enter Your Required Book ID" required=""><br>
        
        <button style="text-align: center;" class="btn btn-default" type="submit" name="submit">Enter</button>
    </form>
  </div>
<?php
    if(isset($_POST['submit']))
    {
		
		
		echo "Please contact the owner of your returned book to return it."."<br/>";
		echo "<table class='table table-bordered table-hover' border=2>";
		
			echo "<tr style='background-color: #6db6b9e6;'>";
				echo "<th>"; echo "Owner-Name";  echo "</th>";
				echo "<th>"; echo "Phone_no";  echo "</th>";
				
			echo "</tr>";	
		$q=mysqli_query($db,"SELECT owner_name,phone_no from owner_details where owner_id = (select owner_id from book_details where book_id='$_POST[book_id]');");
			while($row=mysqli_fetch_assoc($q))
			{
				
				echo "<tr>";
				
				echo "<td>"; echo $row['owner_name']; echo "</td>";
				echo "<td>"; echo $row['phone_no']; echo "</td>";
				echo "</tr>";
			}
		echo "</table>";
    }
?>
</div>


</body>