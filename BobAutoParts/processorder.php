<?php
/**
 * Created by PhpStorm.
 * User: xiangang
 * Date: 16/8/2
 * Time: 下午12:58
 */
$tireqty= $_POST["tireqty"];
$oilqty= $_POST["oilqty"];
$sparkqty= $_POST["sparkqty"];
$address= $_POST["address"];
$DOCUMENT_ROOT= $_SERVER["DOCUMENT_ROOT"];
$date= @date("H:i, jS F Y");
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Bob's Auto Parts</title>
</head>
<body>
<h1>Bobs's Auto Parts</h1>
<h2>Order Result!</h2>
<?php
echo "<p>Order processed at ".$date."</p>";
echo "<p>Your order is follow:</p>";
$totalqty= 0;
$totalqty= $tireqty+ $oilqty+ $sparkqty;
echo "Items ordered: ".$totalqty."<br />";

if($totalqty==0){
    echo "Your haven't buy any thing!"."<br />";
}else{
    if($tireqty>0){
        echo "Tire: ".$tireqty."<br />";
    }
    if($oilqty>0){
        echo "Oil: ".$oilqty."<br />";
    }
    if($sparkqty>0){
        echo  "Spark: ".$sparkqty."<br />";
    }
}

define("TIREPRICE",100);
define("OILPRICE",200);
define("SPARKPRICE",20);

$amount= 0.00;
$amount= $tireqty*TIREPRICE+$oilqty*OILPRICE+$sparkqty*SPARKPRICE;
$amount= number_format($amount,2,'.','');

echo "<p>Total money of order is ".$amount."</p>";
echo "<p>Ship address is ".$address."</p>";

$fp= @ fopen("order.txt","ab");
flock($fp,LOCK_EX);
$outputstring= $date."\t".$tireqty."tires"."\t".$oilqty."oil"."\t".$sparkqty."saprk plugs"."\t\$".$amount."\t".$address."\n";
if(!$fp){
    echo "<p><strong>Your order can not be processed now, please try later!</strong></p></body></html>";
    exit;
}
fwrite($fp,$outputstring,strlen($outputstring));
flock($fp,LOCK_UN);
fclose($fp);
echo "<p>Order processed</p>";
?>
<a href="login.html">Admin login!</a>
</body>
</html>
