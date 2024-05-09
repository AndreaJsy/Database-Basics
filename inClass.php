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
echo "inClass";
echo "<BR>";
system("ls -l ./inClass.php");

require_once("/var/www/db/connect.php");
echo "<BR>";
// system("ls -l hw2.php");
// echo $sys;

echo "<br>","<br>";
$sql = "SELECT BRANCH_NAME
FROM branch
WHERE NUMBER_EMPLOYEES < 10";
echo $sql;

echo "<br>","<br>";
$sql = "SELECT author.AUTHOR_LAST,author.AUTHOR_FIRST
FROM author
ORDER BY author.AUTHOR_LAST ASC,author.AUTHOR_FIRST DESC";
echo $sql;

echo "<br>","<br>";
$sql = "SELECT author.AUTHOR_FIRST,author.AUTHOR_LAST
FROM author,book
WHERE book.BOOK_TITLE='Vortex'";
echo $sql;

echo "<br>","<br>";
$sql = "SELECT DISTINCT BOOK_TITLE
FROM book,wrote
WHERE SEQUENCE_NUMBER > 1";
echo $sql;



?>
</body>
</html> 
