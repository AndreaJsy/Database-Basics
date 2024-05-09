<html>
<body>
<BR>
<br>
<?php
// session_start()

echo "<BR>";
echo "Shiyu Jiang, Richard Zhang";
echo "<BR>";
echo "Group #9";
echo "<BR>";
echo "HW 2";
echo "<BR>";
system("ls -l ./hw2.php");
require_once("/var/www/db/connect.php");
echo "<BR>";
// system("ls -l hw2.php");
// echo $sys;


$sql = "SELECT DISTINCT student.ID, student.name
FROM student
JOIN takes ON student.ID = takes.ID
JOIN section ON takes.course_id = section.course_id
JOIN course ON section.course_id = course.course_id
WHERE course.dept_name = 'Comp. Sci.'";
echo "<br>","<br>";
$result = $conn->query($sql);
//echo $result;
$count = mysqli_num_rows($result);
echo "<P>Problem 1.1 ",$count," hits";
echo "<BR>";
echo $sql;
echo "<P><P>";
echo "<table>";
while ($row = $result->fetch_assoc()) {
        echo "<TR>";
        echo "<TD>";
          echo $row["ID"];
        echo "</TD>";

        echo "<TD>";
          echo $row["name"];
        echo "</TD>";

        echo "</TR>";

}
echo "</table>";

$sql = "SELECT DISTINCT student.ID, student.name
FROM student
WHERE NOT EXISTS (
        SELECT *
        FROM takes
        WHERE takes.year < 2017 AND takes.ID = student.ID
)";
echo "<br>","<br>";

$result = $conn->query($sql);
// echo $result;
$count = mysqli_num_rows($result);
echo "<P>Problem 1.2 ", $count, " hits";
echo "<BR>";
echo $sql;
echo "<P><P>";
echo "<table>";
while ($row = $result->fetch_assoc()) {
        echo "<TR>";

        echo "<TD>";
          echo $row["ID"];
        echo "</TD>";

        echo "<TD>";
          echo $row["name"];
        echo "</TD>";

        echo "</TR>";
}
echo "</table>";

$sql = "SELECT department.dept_name, MAX(instructor.salary) as maxSalary
FROM department
JOIN instructor ON department.dept_name = instructor.dept_name
GROUP BY department.dept_name";
echo "<br>","<br>";

$result = $conn->query($sql);
// echo $result;
$count = mysqli_num_rows($result);
echo "<P>Problem 1.3 ", $count, " hits";
echo "<BR>";
echo $sql;
echo "<P><P>";
echo "<table>";
while ($row = $result->fetch_assoc()) {
        echo "<TR>";

        echo "<TD>";
          echo $row["dept_name"];
        echo "</TD>";

        echo "<TD>";
          echo $row["salary"];
        echo "</TD>";

        echo "</TR>";
}
echo "</table>";

$sql = "SELECT MIN(maxSalary) as lowestMaxSalary
FROM (
        SELECT department.dept_name, MAX(instructor.salary) as maxSalary
FROM department
JOIN instructor ON department.dept_name = instructor.dept_name
GROUP BY department.dept_name;
)";
echo "<br>","<br>";

$result = $conn->query($sql);
// echo $result;
$count = mysqli_num_rows($result);
echo "<P>Problem 1.4 ", $count, " hits";
echo "<BR>";
echo $sql;
echo "<P><P>";
echo "<table>";
while ($row = $result->fetch_assoc()) {
        echo "<TR>";

        echo "<TD>";
          echo $row["salary"];
        echo "</TD>";

        echo "</TR>";
}
echo "</table>";

?>

<P>
<P>
<P>
PROBLEM 2
<P>
a- SELECT XXX FROM ...
<P>
b- SELECT XXX FROM ...
</body>
</html> 
