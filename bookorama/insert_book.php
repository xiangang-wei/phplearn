<?php
/**
 * Created by PhpStorm.
 * User: xiangang
 * Date: 16/8/23
 * Time: 上午12:14
 */
?>
<html>
<head>
    <title>Book-O-Rama Search Results</title>
</head>
<body>
<h1>Book-O-Rama Insert Results</h1>
<?php
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'bookrama');
define('DB_PASSWORD', 'bookrama123');
define('DB_NAME', 'books');

$isbn = trim($_POST['isbn']);
$author = trim($_POST['author']);
$title = trim($_POST['title']);
$price = trim($_POST['price']);

if (!$isbn || !$author || !$title || !$price) {
    echo "You have not enter all the required details <br/>" . "Please go back and try again!";
    exit;
}

if (!get_magic_quotes_gpc()) {
    $isbn = addslashes($isbn);
    $author = addslashes($author);
    $title = addslashes($title);
    $price = addslashes($price);
}

@ $db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (mysqli_connect_errno()) {
    echo "Error: Could not connect to the database. Please try again!";
    exit;
}

$query = "insert into books values ('" . $isbn . "', '" . $author . "', '" . $title . "', '" . $price . "' )";
$result = $db->query($query);

if ($result) {
    echo $db->affected_rows . " book inserted into database. ";
} else {
    echo "An error has occurred. The item was not added.";
}

$result->free();
$db->close();
?>
</body>
</html>