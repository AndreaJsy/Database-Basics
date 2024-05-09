<?php
// session_start();
echo "<BR>";
require_once('/var/www/db/connect.php');

// require("menu.php);
$sql = "SELECT * FROM instructor ";
echo $sql;
echo "<br>","<br>";
$result = $conn->query($sql);
// echo $result;
print_r($result);
$count = mysqli_num_rows($result);
echo "<P>Results",$count;
echo "<P><P>";
while($row = $result->fetch_assoc()) {
        //print_r($row);
        echo $row['ID'];
        echo " ";
        echo $row['name'];
        echo " ";
        echo $row['dept_name'];
        echo " ";
        echo $row['salary'];
        echo "<BR> ";
}