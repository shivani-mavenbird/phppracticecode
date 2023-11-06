<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registrtion Form </title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="Registrtion">
		<div class="Registrtion_titel">
			<h1>PHP CRUD FORM </h1>
		</div>
		<div class="Registrtion_details">
		   <form  method="POST" name="form">
		   		<ul>
		   			<li>
				    	<div class="input_field">
					    <label for="name">Name: </label>
					    <input type="text" name="name" required>
					    </div>
						</li>
				    <li>
				    	<div class="input_field">
					    <label for="address">address : </label>
					    <input type="text" name="address" required>
					    </div>
				    </li>
				    <li>
				    	<div class="input_field">
					    <label for="contact">contact no :</label>
					    <input type="number" name="contact" required>
						</div>
				    </li>
				    <li>
				    	<div class="input_field">				   
					    <label for="email">Email :</label>
					    <input type="text" name="email" required>
						</div>
				    </li>
				    <li>
				    	<div class="input_field">				   
					    <label for="image"enctype=”multipart/form-data”>Add image  :</label>
					    <input type="file" name="image" multiple accept="image/*">
						</div>
				    </li>
			    	<li>
			    		<div class="add_item">
				    	<input type="submit" value="Add Item">
				    	</div>
				    </li>
				</ul>
			</form>
		</div>
		<div class="Registrtion_link">
			<a href="read.php">Read</a>
		    <!-- <a href="update.php">Update</a> -->
		   	<!-- <a href="delete.php">Delete</a> -->
		</div>
	</div>
</body>
</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{  
	  require_once "connection.php";
    $name = $_POST['name'];
    $address =$_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $image = $_POST['image'];
    $sql = "INSERT INTO form (name,address,contact,email,image) VALUES ('$name','$address','$contact','$email','$image')";
    if ($conn->query($sql) === TRUE)
    {
      	echo '<script>alert("Your Data succesfully...")</script>';
    }
    else 
      {
      	echo '<script>alert("try again...")</script>';
      }
      $sql = "SELECT * FROM form";
   		$result = $conn->query($sql);

    	if ($result->num_rows > 0)
    		{
        	echo "<table><tr><th>ID</th><th>Name</th><th>Address</th><th>contact</th><th>Email</th><th>Image</th></tr>";
      	while ($row = $result->fetch_assoc()) 
        {
            echo "<tr><td>" . $row["id"] . "</td>
                      <td>" . $row["name"] . "</td>
                      <td>" . $row["address"] . "</td>
                      <td>" . $row["email"] . "</td>
                      <td>" . $row["contact"] . "</td>
                      <td>" . $row["image"] . "</td>
                      <td><a href='update.php?id=" . $row["id"] . "'>update</a></td>
                			<td><a href='delete.php?id=" . $row["id"] . "'>delete</a></td>
                  </tr>";
        }
        		echo "</table>";
    		} 
  		$conn->close();
}

?>