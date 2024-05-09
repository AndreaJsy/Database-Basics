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

$sql = "SELECT department.dept_name, MAX(instructor.salary) as MaxSalary
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
          echo $row["MaxSalary"];
        echo "</TD>";

        echo "</TR>";
}
echo "</table>";

$sql = "SELECT MIN(maxSalary) as lowestMaxSalary
FROM (
    SELECT MAX(instructor.salary) AS maxSalary
    FROM department
    JOIN instructor ON department.dept_name = instructor.dept_name
    GROUP BY department.dept_name
) AS subquery";
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
          echo $row["lowestMaxSalary"];
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
a- SELECT COUNT(DISTINCT accident.report_number)
FROM person
JOIN owns ON person.driver_id = owns.driver_id
JOIN participated ON owns.license_plate = participated.license_plate
JOIN accident ON participated.report_number = accident.report_number
WHERE person.name = 'John Smith';
<P>
b- UPDATE participated
SET participated.damage_amount = 3000
WHERE participated.license_plate = 'AABB2000' AND participated.report_number = 'AR2197';
</body>
</html> 
