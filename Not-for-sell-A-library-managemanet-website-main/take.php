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
    <h2 style="color:black; font-family: Lucida Console; text-align: center"><b>Take Books</b></h2>
    <h2 style="color:black; font-family: Lucida Console; text-align: center"><b>Please know your desired book ID from available book list</b></h2>
    <form class="book" action="" method="post">
        
        <input type="text" name="book_id" class="form-control" placeholder="Enter Your Required Book ID" required=""><br>
        <input type="text" name="user_name" class="form-control" placeholder="Enter Your User Name" required=""><br>
        
		<input type="text" name="customer_name" class="form-control" placeholder="Enter Your Name" required=""><br>
        <input type="text" name="phone_no" class="form-control" placeholder="Enter Your Phone Number" required=""><br>
       
	 
        

        <button style="text-align: center;" class="btn btn-default" type="submit" name="submit">Enter</button>
    </form>
  </div>
<?php
    if(isset($_POST['submit']))
    {
		
		$current_date=date("Y-m-d");
		$return_date=date_create($current_date);
		date_add($return_date,date_interval_create_from_date_string("30 days"));
		$rd=date_format($return_date,"Y-m-d");
		echo "please return the book within ".$rd."<br/>";
		
		
		mysqli_query($db,"INSERT INTO customer_details VALUES ('$_POST[user_name]', '$_POST[customer_name]',  '$_POST[phone_no]','Not paid');");
        mysqli_query($db,"UPDATE  book_details set status='Not Available' where book_id='$_POST[book_id]';");
		mysqli_query($db,"INSERT INTO  bill_details VALUES ('','$_POST[book_id]', '$_POST[user_name]','$current_date','$rd','','');");
		echo "Your Bill Number is ".mysqli_insert_id($db)."<br/>"."Please rember your  bill number."."<br/>";
		
        mysqli_query($db,"UPDATE  owner_details set status='Not_return' where owner_id=(select owner_id from book_details where book_id='$_POST[book_id]');");
		
		echo "Please contact the owner of your desired book to collect it.";
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