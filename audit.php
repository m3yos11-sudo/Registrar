<?php
include"db-connect.php";

   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         table {
            width: 100%;
           
            border-collapse: collapse;
            margin-top: 20px;
        }
        body{margin-top: 20px;
            border-collapse: collapse}
        table, th, td {
            border: 1px solid black;
            padding: 3px;
            text-align: center;
            font-size: 15px;
        }
    </style>
</head>
<body>
    <?php include'header.php'; ?>
    <div class="card">
        <div class="card-body">
            <?php 
             $sql = "SELECT id, user_id, action,details, timestamp FROM audit_log"; 
    $result = $conn->query($sql);
    
     if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>User Id</th><th>Action</th><th>Details</th><th>Timestamp</th></tr>"; // Table headers

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["user_id"] . "</td>";
            echo "<td>" . $row["action"] . "</td>";
            echo "<td>" . $row["details"] . "</td>";
            echo "<td>" . $row["timestamp"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    
    $conn->close(); ?>
        </div>
    </div>

</body>
</html>