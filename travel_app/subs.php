<?php
session_start();
$connection=mysqli_connect('localhost' , 'root' ,'');
mysqli_select_db($connection,'subscribers');
$mailuser = $_POST['emailuser'];
$t = "select * from clients where email='$mailuser'";
$result = mysqli_query($connection, $t);
$num = mysqli_num_rows($result);
if($num==1){
    echo "Account from this Email id has been already subscribed";
    header("refresh:4,url=index.html");
}
else{
    $insertdata = " insert into clients(email)values('$mailuser')";
    mysqli_query($connection,$insertdata);
    echo "Subscribed sucessfully";
    header("refresh:4,url=index.html");
}
?>