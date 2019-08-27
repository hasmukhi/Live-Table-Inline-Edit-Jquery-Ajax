<?php
include("db.php");
if($_POST['id'])
{
$id=mysqli_escape_String($bd,$_POST['id']);
$name=mysqli_escape_String($bd,$_POST['name']);
$age=mysqli_escape_String($bd,$_POST['age']);
$sql = "update table_name set name='$name',age='$age' where id='$id'";
mysqli_query($bd,$sql);
}
?>
