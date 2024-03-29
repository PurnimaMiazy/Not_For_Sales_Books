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
  background-color: #DACDE5;
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
  background-color: #171618;
  color: white;
  height: 40px;
}

	</style>

</head>
<body>
	
<div >

  <div class="container" style="text-align: center;">
    <h2 style="color:black; font-family: Lucida Console; text-align: center"><b>Add New Books</b></h2>
    
    <form class="book" action="" method="post">
        
        
        <input type="text" name="book_name" class="form-control" placeholder="Book Name" required=""><br>
        <input type="text" name="author" class="form-control" placeholder="Authors Name" required=""><br>
        <input type="text" name="category" class="form-control" placeholder="Category" required=""><br>
		<input type="text" name="status" class="form-control" placeholder="Status" required=""><br>
	    <input type="text" name="owner_name" class="form-control" placeholder="Owner_name" required=""><br>
		<input type="text" name="phone_no" class="form-control" placeholder="Phone No" required=""><br>
       
        

        <button style="text-align: center;" class="btn btn-default" type="submit" name="submit">ADD</button><br> <br>
		<a href="remove.php"><font size="5" color="#0B0B04"><b>WANT TO REMOVE BOOKS?</b></font></a>
    </form>
  </div>
<?php
    if(isset($_POST['submit']))
    {
       mysqli_query($db,"INSERT INTO owner_details VALUES ('', '$_POST[owner_name]', '$_POST[phone_no]','','') ;");
	   $last_id = mysqli_insert_id($db);
	    echo "New record created successfully. Last inserted owner ID is: ".$last_id."<br/>";
	   
        mysqli_query($db,"INSERT INTO book_details VALUES ('', '$_POST[book_name]', '$_POST[author]', '$_POST[category]', '$last_id', '$_POST[status]') ;");
       
		
    }
?>
</div>


</body>
