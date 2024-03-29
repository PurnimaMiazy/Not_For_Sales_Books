<?php
  include "connec.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>REMOVE _Books</title>
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
    <h2 style="color:black; font-family: Lucida Console; text-align: center"><b>Remove  Books</b></h2>
    
    <form class="book" action="" method="post">
        
        
        <input type="text" name="book_name" class="form-control" placeholder="Book Name" required=""><br>
        
       
        

        <button style="text-align: center;" class="btn btn-default" type="submit" name="submit">REMOVE</button><br> <br>
		
    </form>
  </div>
<?php
 if(isset($_POST['submit'])){
		mysqli_query($db,"DELETE from book_details where book_id=(SELECT book_id from book_details where book_name='$_POST[book_name]');");
		 echo "Your  book successfullyremoved.";
		
	}




?>
</div>


</body>
