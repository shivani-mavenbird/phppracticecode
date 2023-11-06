<?php
require_once "connection.php";
    $sql = "SELECT * FROM form";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
        echo "<table><tr><th>ID</th><th>Name</th><th>Address</th><th>contact</th><th>Email</th><th>Image</th></tr>";
    while ($row = $result->fetch_assoc()) 
    {
        echo "<tr>
                <td>" . $row["id"] . "</td>
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
    } else {
        echo "No items found.";
    }
$conn->close();
?>