<?php
/**
 * Created by PhpStorm.
 * User: xiangang
 * Date: 16/8/16
 * Time: 下午4:33
 */
?>
<html>
<head>
    <title>Book-O-Rama Search Results</title>
</head>
<body>
<h1>Book-O-Rama Search Results</h1>
<?php
// create variables
define('DB_HOST', '127.0.0.1');          //不能使用localhost代替127.0.0.1,否则会显示无法连接到数据库。
define('DB_USER', 'bookrama');
define('DB_PASSWORD', 'bookrama123');
define('DB_NAME', 'books');
$searchtype = $_POST['searchtype'];
$searchterm = trim($_POST['searchterm']);
if (!$searchterm || !$searchtype) {
    echo "You haven't select anything!";
    exit;
}
if (!get_magic_quotes_gpc()) {
    $searchterm = addslashes($searchterm);
    $searchtype = addslashes($searchtype);
}
@ $db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (mysqli_connect_errno()) {
    echo "Error: Could not connect to the database, Please try again";
    exit;
}
$query = "select * from books where " . $searchtype . " like '%" . $searchterm . "%'";
$result = $db->query($query);

$num_result = $result->num_rows;

echo "<p>Number of books found: " . $num_result . "</p>";

for ($i = 0; $i < $num_result; $i++) {
    $row = $result->fetch_assoc();
    echo "<p><strong>" . ($i + 1) . ". Tittle: ";
    echo htmlspecialchars(stripslashes($row['title']));
    echo "</strong><br />Author: ";
    echo stripslashes($row['author']);
    echo "<br />ISBN: ";
    echo stripslashes($row['isbn']);
    echo "<br />Price: ";
    echo stripslashes($row['price']);
    echo "</p>";
}
$result->free();
$db->close();
?>
</body>
</html>
