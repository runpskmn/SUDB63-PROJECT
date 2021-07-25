<?php
include 'connect.php';
$conn = OpenCon();
?>
<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
</head>
<body>


<?php
    $sql = "SELECT * FROM member";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Tel</th><th>Address</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["Member_id"]. "</td><td>" . $row["First_Name"]. " " . $row["Last_Name"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["tel"] . "</td><td>" . $row["Address"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    
    $conn->close();
?>

</body>
</html>
