<?php
  include "connec.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
</head>
<body>
<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="search books.." required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search2" placeholder="search category of books.." required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit2" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search3" placeholder="search Author Name of books.." required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit3" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
		<form class="navbar-form" method="post" name="form1">
			
				<button style="background-color: #6db6b9e6;" type="submit" name="avail" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
					Want to know available books?
				</button>
		</form>
		
	</div>


	<h2>List Of Books</h2>
	<?php

	if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT * from book_details where book_name like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No book found. Try searching again.";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Category";  echo "</th>";
				
				
				echo "<th>"; echo "Owner_id";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				
				echo "<tr>";
				echo "<td>"; echo $row['book_id']; echo "</td>";
				echo "<td>"; echo $row['book_name']; echo "</td>";
				echo "<td>"; echo $row['author']; echo "</td>";
				echo "<td>"; echo $row['category']; echo "</td>";
				
				echo "<td>"; echo $row['owner_id']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
			}
		}
		else if(isset($_POST['submit3']))
		{
			$q=mysqli_query($db,"SELECT * from book_details where author like '%$_POST[search3]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No book found. Try searching again.";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Category";  echo "</th>";
				
				
				echo "<th>"; echo "Owner_id";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				
				echo "<tr>";
				echo "<td>"; echo $row['book_id']; echo "</td>";
				echo "<td>"; echo $row['book_name']; echo "</td>";
				echo "<td>"; echo $row['author']; echo "</td>";
				echo "<td>"; echo $row['category']; echo "</td>";
				
				echo "<td>"; echo $row['owner_id']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
			}
		}
		else if(isset($_POST['avail']))
		{
			$q=mysqli_query($db,"SELECT * from book_details where status='Available'");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No book found. Try searching again.";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Category";  echo "</th>";
				
				
				echo "<th>"; echo "Owner_id";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				
				echo "<tr>";
				echo "<td>"; echo $row['book_id']; echo "</td>";
				echo "<td>"; echo $row['book_name']; echo "</td>";
				echo "<td>"; echo $row['author']; echo "</td>";
				echo "<td>"; echo $row['category']; echo "</td>";
				
				echo "<td>"; echo $row['owner_id']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
			}
		}
		
		
		
		
		
		
			/*if button is not pressed.*/
		else	if(isset($_POST['submit2']))
		{
			$q=mysqli_query($db,"SELECT * from book_details where category like '%$_POST[search2]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No book found. Try searching again.";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Category";  echo "</th>";
				
				
				echo "<th>"; echo "Owner_id";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				
				echo "<tr>";
				echo "<td>"; echo $row['book_id']; echo "</td>";
				echo "<td>"; echo $row['book_name']; echo "</td>";
				echo "<td>"; echo $row['author']; echo "</td>";
				echo "<td>"; echo $row['category']; echo "</td>";
				
				echo "<td>"; echo $row['owner_id']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
			}
		}
			
			
			
			
			
			
			
		else
		{
			$res=mysqli_query($db,"SELECT * FROM `book_details` ORDER BY `book_details`.`book_name` ASC;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Category";  echo "</th>";
				
				
				echo "<th>"; echo "Owner_id";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['book_id']; echo "</td>";
				echo "<td>"; echo $row['book_name']; echo "</td>";
				echo "<td>"; echo $row['author']; echo "</td>";
				echo "<td>"; echo $row['category']; echo "</td>";
				
				echo "<td>"; echo $row['owner_id']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
		}
	?>
</body>
</html>