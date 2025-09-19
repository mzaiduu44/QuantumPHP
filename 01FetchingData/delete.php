<?php
include("connection.php");

if(@$_GET["id"])
{
    $id=$_GET["id"];
    $query=mysqli_query($con,"delete from students where Id=$id");

    if($query)
    {
        header("location:index.php");
    }
    else
    {
        echo "<script>alert('Error in your sql syntax...')</script>";
    }
}
?>
