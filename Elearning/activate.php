<?php
  session_start();
include("connection.php");
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];

    $updatequery = " update users set status = '1' where user_id = '$user_id' ";
    $query = mysqli_query($con,$updatequery);

    if($query){
        if(isset($_SESSION['msg'])){
            $_SESSION['msg'] = "Account updated successfully!";
            header('location: Login.php');
        }else{
            $_SESSION['msg'] = "";
            header('location: Login.php');
        }
    }else{
        $_SESSION['msg'] = "Account not updated";
            header('location: Register.php');
    }
}
?>