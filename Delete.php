<?php
include "Db.php";

if (isset($_GET["BookId"])) {
    $BookId =$_GET["BI"];

    $sql=$conn->prepare("Delete from home where BookId=?");
    $sql->bind_param('i',$BookId);
    if ($sql->execute()) {
        header("Location:Home.php");
    };

};



?>