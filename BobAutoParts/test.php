<?php
/**
 * Created by PhpStorm.
 * User: xiangang
 * Date: 16/8/3
 * Time: 下午6:37
 */
echo "<h1>This is a Test!</h1>";
$grade= array(
    "Tom" => 98,
    "Jim" => 100,
    "Kate" => 100
);
echo $grade["Tom"]."<br />";
$grade["Helen"]= 97;
foreach ($grade as $key => $value){
    echo $key.": ".$value."<br />";
}
reset($grade);
while($element = each($grade)){
    echo $element["key"].": ".$element["value"]."<br />";
}
reset($grade);
while(list($name,$score)= each($grade)){
    echo $name.": ".$score."<br />";
}
reset($grade);
$a= array(1,2,3,4,5);
$a += $grade;
foreach ($a as $key => $value){
    echo $key.": ".$value."<br />";
}
echo $a == $grade?"true":"false"."<br />";
reset($a);
ksort($grade);
foreach ($grade as $key => $value){
    echo $key.": ".$value."<br />";
}
reset($grade);
$b= array("cat","tiger","dog","lion");
sort($b);
foreach ($b as $c){
    echo $c."<br />";
}
echo reset($b)."<br />";
echo $c."<br />";
rsort($a);
for($i=0;$i<5;$i++){
    echo  $i."<br/>";
}
echo $i."<br />";   //在for循环里面创建的变量i是属于全局变量。
asort($grade);
foreach ($grade as $key => $value){
    echo $key.": ".$value."<br />";
}
echo $key."<br />";
function add(){
    $cc= 100;
    echo $cc."<br />";
}
add();
echo $cc."<br />"; //没有输出,但是并没有报错。

echo  "<hr />"."<br />";
$products= array(
    array("tire",100),
    array("oil",1000),
    array("spark",20)
);
function compare($x,$y){
     if($x[1]==$y[1]){
         return 0;
     }else if($x[1]>$y[1]){
         return 1;
     }else{
         return -1;
     }
}
usort($products,'compare');
for($i=0;$i<3;$i++){
    for($j=0;$j<2;$j++){
        echo "|".$products[$i][$j];
    }
}
echo "<br />";
$str= "I still haven't received my last orders! ";
$text= strstr($str,"r");
echo $text."<br />";
$mailaddress= "14210720192@fudan.edu.cn";
$arr= split("\.|@",$mailaddress);
while (list($key,$value)= each($arr)){
    echo $value."<br />";
}
echo "<hr />";
$haha = "hahahahahha";
function sayhaha(){
    global $haha,$aaaaa;
    $aaaaa= 12345;
    echo  $haha."<br />";
}
sayhaha();
echo $aaaaa;
function reverse_r($str){
    if(strlen($str)>1){
        reverse_r(substr($str,1));
    }
    echo substr($str,0,1);
    return;
}
reverse_r("hello");
function reverse_s($str){
    for($i=1;$i<=strlen($str);$i++){
        echo substr($str,-$i,1);
    }
}
reverse_s("world!");

?>