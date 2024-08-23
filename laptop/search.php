<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laptop_recommendation";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['processor'])) {
    $processor = $conn->real_escape_string($_POST['processor']);
    
    // SQL query to fetch players related to the selected category
    $sql = "SELECT * FROM laptops WHERE processor='$processor'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>processor</th><th>Name</th><th>ram</th><th>stroage</th><th>price</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . htmlspecialchars($row["brand"]) . "</td><td>" . htmlspecialchars($row["processor"]) . "</td><td>" . htmlspecialchars($row["ram"]) . "</td><td>" . htmlspecialchars($row["storage"]) ."</td><td>" . htmlspecialchars($row["price"]) . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "processor is not found";
    }
} else {
    echo "processor not set.";
}

$conn->close();
?>