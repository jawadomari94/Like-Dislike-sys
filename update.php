<?php
require "config.php";

if(isset($_POST['Id']) AND isset($_POST['val'])){
    $id = $_POST['Id'];
    $val = $_POST['val'];

    $sql = "UPDATE posts SET likes='$val' WHERE Id='$id'";
    $update = $conn->prepare($sql);
    $update->execute();


}



?>