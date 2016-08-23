<?php
/**
 * Created by PhpStorm.
 * User: xiangang
 * Date: 16/8/2
 * Time: 下午2:48
 */
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Bob's Auto Parts</title>
</head>
<body>
<h1>Bob's Auto Parts</h1>
<h2>Customer order:</h2>
<?php
$fp = @ fopen("order.txt", "rb");
if (!$fp) {
    echo "<p><strong>No order is pending, Please try again!</strong></p></body></html>";
    exit;
}
while (!feof($fp)) {
    $order = fgets($fp, 500);
    echo "<strong>$order</strong>" . "<br />";
}
fclose($fp);
?>
<?php
$products = file("order.txt"); //file函数将文件中的每一行作为数组$products中的一个元素。
if (count($products) == 0) {
    echo "<p><strong>There is no producets ordered!</strong></p>";
}
echo "<table border=\"1\" style=\"border-collapse: collapse\">";
echo "<tr><th bgcolor='#a9a9a9'>Order Date</th>
              <th bgcolor='#a9a9a9'>Tires</th>
              <th bgcolor='#a9a9a9'>Oil</th>
              <th bgcolor='#a9a9a9'>Spark Plugs</th>
              <th bgcolor='#a9a9a9'>Total</th>
              <th bgcolor='#a9a9a9'>Address</th>
           </tr>";
for ($i = 0; $i < count($products); $i++) {
    $line = explode("\t", $products[$i]);
    $line[1] = intval($line[1]);
    $line[2] = intval($line[2]);
    $line[3] = intval($line[3]);

    echo "<tr>
                 <td>$line[0]</td>
                 <td>$line[1]</td>
                 <td>$line[2]</td>
                 <td>$line[3]</td>
                 <td>$line[4]</td>
                 <td>$line[5]</td>
              </tr>";

}
echo "</table>";


?>
</body>
</html>
