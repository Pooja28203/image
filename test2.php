<?php
error_reporting(E_ALL);
header("content-type: image/jpg");
$file_name='templates/mens/jeans/jpg/template.jpg';
include "includes/config.php";
$sql="SELECT * FROM image";
foreach($connection->mysqli_query($sql) as $row ){
  //echo "$row[name]<br>";
$x=200; // Horizontal postion to add name
$y=200; // vertical
$img_source=imagecreatefromjpeg($file_name);
/// adding name ///
$text_color=imagecolorallocate($img_source,0,0,255);
ImageString($img_source,5,$x,$y,$row['sku'],$text_color);
// adding class ///
$y=230; // vertical
ImageString($img_source,5,$x,$y,$row['style'],$text_color);
// adding mark ///
$y=260; // vertical
ImageString($img_source,5,$x,$y,$row['waist_in'],$text_color);
$y=290; // vertical
ImageString($img_source,5,$x,$y,$row['rise_in'],$text_color);
$x=60;
$y=399; // vertical
ImageString($img_source,5,$x,$y,"ID: ".$row['id'],$text_color);
// adding date and time ///
$x=421;
$y=399;
$today=new DateTime;
$str_date=$today->format('d-m-Y H:i:s');
ImageString($img_source,4,$x,$y,$str_date,$text_color);

//end ///
imagejpeg($img_source,"outputs/$row[id].jpg");
imagedestroy($img_source);
}
?>
