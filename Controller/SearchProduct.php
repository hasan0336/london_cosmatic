<?php
session_start();
// if(!(isset($_GET['category']) || isset($_GET['style']) || isset($_GET['color']) || isset($_GET['brand']))){
//     $_GET['category']=0;
//     $style=0;
//     $color=0;
//    $_GET['brand']=0;

// }
if(!isset($_GET['category'])){
    $cat=$_GET['category']=0;
    $_SESSION['cat']=$cat;
}
else{
    $cat= $_GET['category'];
    $_SESSION['cat']=$cat;
}
if(!isset($_GET['subcat'])){
    $subcat=$_GET['subcat']=0;
    $_SESSION['subcat']=$subcat;
}
else{
    $subcat= $_GET['subcat'];
    $_SESSION['subcat']=$subcat;
}
if(!isset($_GET['style'])){
    $style=$_GET['style']=0;
    $_SESSION['style']=$style;
}
else{
    $style=$_GET['style'];
    $_SESSION['style']=$style;
}
if(!isset($_GET['color'])){
    $color=$_GET['color']=0;
    $_SESSION['color']=$color;
}
else{
    $color=$_GET['color'];
    $_SESSION['color']=$color;
}
if (!isset($_GET['brand'])) {
    
  echo $brand=$_GET['brand']=0;
   $_SESSION['brand']=$brand;
}
else{
   echo $brand=$_GET['brand'];
    $_SESSION['brand']=$brand;
}
header("Location:../productslist.php");
?>