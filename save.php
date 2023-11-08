<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $name="";
  if(empty($name)){
    echo "error";
  }else
  {
    $name = $_POST['name'];
    }
  $countImages = count($_POST['image']);
  $i=1;
  foreach($_POST['image'] as $image)
  {
     if($countImages > $i){
        $images .=$image.',';
     }else{
      $images .=$image;
     }
     $i++;
  } 
 
 require_once "connection.php";
    
    $address =$_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $image = $_FILES['image'];
    
    $sql = "INSERT INTO form (name,address,contact,email,image) VALUES ('$name','$address','$contact','$email','$images')";
     
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
                      <td>" . $row["contact"] . "</td>
                      <td>" . $row["email"] . "</td>
                      <td>"; 
                       $images = explode(",", $row['image']);
                        foreach ($images as $image)
                        {
                            echo "<img src='/images/" . $image . "' width='30' height='30'>&nbsp&nbsp";
                        }
                        echo "</td>
                      <td><a href='update.php?id=" . $row["id"] . "'>update</a></td>
                <td><a href='delete.php?id=" . $row["id"] . "'>delete</a></td>
                  </tr>";
        }
        echo "</table>";
    }
  $conn->close();
}
?> 