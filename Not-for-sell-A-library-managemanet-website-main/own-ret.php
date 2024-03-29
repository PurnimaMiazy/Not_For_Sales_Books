<?php
  include "connec.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Return_Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}
		
		body {
  background-color: #EB95BC;
  background-image: url("4.png");
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
}B
.book
{
    width: 400px;
    margin: 0px auto;
}
.form-control
{
	
  background-color: #1D2020;
  color: white;
  height: 40px;
  
}

	</style>
		
</head>
<body>
	
<div >

  <div class="container"    style="text-align: center;">
    <h1 style="color:black; font-family: Lucida Console; text-align: center"><b>Return Books</b></h2>
    <h2 style="color:#900C3F; font-family: Lucida Console; text-align: center"><b>Please know your returned Book ID and the Owner ID of the book from  book list</b></h2>
    <form class="book" action="" method="post">
        
        <input type="text" name="book_id" class="form-control" placeholder="Enter Your Returned Book ID" required=""><br>
        <input type="text" name="owner_id" class="form-control" placeholder="Enter the Owner ID of your Returned Book" required=""><br> 
        
		<input type="text" name="bill_no"  class="form-control" placeholder="Enter Your Bill_no which is provided you " required=""><br>

        <button style="text-align: center;" class="btn btn-default"  type="submit" name="submit">Enter</button><br> 
    </form>
	<a href="forget.php"><font size="5" color="#0B0B04"><b>FORGET BILL NUMBER?</b></font></a>
	
  </div>
<?php
    if(isset($_POST['submit']))
    {
        mysqli_query($db,"UPDATE owner_details set payment=payment+20 where owner_id='$_POST[owner_id]';");
		mysqli_query($db,"UPDATE owner_details set status='Returned' where owner_id='$_POST[owner_id]';");
	
        mysqli_query($db,"UPDATE  customer_details set status='Paid' where user_name=(select user_name from bill_details where bill_no='$_POST[bill_no]');");
		$cdate=date("Y-m-d");
		mysqli_query($db,"UPDATE  bill_details set back_date='$cdate' where bill_no='$_POST[bill_no]';");
		
		 mysqli_query($db,"UPDATE  book_details set status='Available' where book_id='$_POST[book_id]';");
		?>
		
		
		<h2><font  color="purple"><mark>Please contact the 018......... number to submit the foundation's amount from your book</mark></font></h2>
<?php
    }
?>
</div>


</body>