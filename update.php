<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>update</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
</head>
<body>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM form WHERE id = $id";
        $result = mysqli_query(mysqli_connect('db', 'wordpress', 'wordpress', 'wordpress'), $sql);
        $row = mysqli_fetch_assoc($result);
    ?>
    <div class="update_registrtion">
        <div class="update_registrtion_titel">
            <h1>UPDATE DETAILS FORM </h1>
        </div>
        <div class="Registrtion_details">
          
           <form  action="read.php" method="POST" name="form">
                <ul>
                    <li>
                        <div class="update_field">
                        <label for="id">ID: </label>
                        <input type="text" name="id" value="<?php echo $row['id']; ?>" required>
                        </div>
                    </li>
                    <li>
                        <div class="update_field">
                        <label for="name">Name: </label>
                        <input type="text" name="name" value="<?php echo $row['name']; ?>">
                        </div>
                    </li>
                    <li>
                        <div class="update_field">
                        <label for="address">address : </label>
                        <input type="text" name="address"value="<?php echo $row['address']; ?>">
                        </div>
                    </li>
                    <li>
                        <div class="update_field">
                        <label for="contact">contact no :</label>
                        <input type="number" name="contact"value="<?php echo $row['contact']; ?>">
                        </div>
                    </li>
                    <li>
                        <div class="update_field">                  
                        <label for="email">Email :</label>
                        <input type="text" name="email"value="<?php echo $row['email']; ?>">
                        </div>
                    </li>
                    <li>
                        <div class="update_item">
                        <input type="submit" value="update">
                        </div>
                    </li>
                </ul>
            </form>
           
        </div>
    </div>
      <?php
    } 
    ?>
</body>
</html>
<?php
require_once "connection.php";  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address =$_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    $sql = "UPDATE form SET name='$name', address='$address',contact='$contact',email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Your Data succesfully updated...")</script>'; 

    }else{
        echo '<script>alert("somthing wrong...")</script>';
    }

    // $sql = "SELECT * FROM form";
    // $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
    //     echo "<table><tr><th>ID</th><th>Name</th><th>Address</th><th>contact</th><th>Email</th></tr>";
    //     while ($row = $result->fetch_assoc()) {
    //         echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["address"] . "</td><td>" . $row["email"] . "</td><td>" . $row["contact"] . "</td></tr>";
    //     }
    //     echo "</table>";
    // }
    
}
$conn->close();
?>