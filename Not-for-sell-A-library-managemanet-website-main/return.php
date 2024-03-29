<?php
  include "connec.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Return_Books</title>
	<link rel="stylesheet" type="text/css" href="stle.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}
		
		body {
  background-color: #171315e8;
  background-image: url("5.png");
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
  background-color: #080707;
  color: white;
  height: 40px;
}

	</style>
		
</head>
<body>
	
  <div class="container" style="text-align: center;">
   <h1 style="text-align: center;font-size: 55px;"><font color="#33D984" face="Lucida Calligraphy">RETURN_BOOK</font></h1><br><br>
				<ul align="center">
<br> <br>
					<li><a href="cus_ret.php"><font size="6.5" color="#A40AA4"><b>RETURN BOOK to OWNER</b></font></a></li><br><br><br>
					
					<li><a href="own-ret.php"><font size="6.5" color="#D64603"><b>RETURN BOOK to WEBSITE</b></font></a></li><br/><br/>
					
					
					
				</ul>
	
</div>

</body>