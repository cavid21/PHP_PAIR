<?php 
    include "config.php";
    
    if (!isset($_GET["id"])) {
        header("Location:show.php");
    }
    
    $id = $_GET['id'];

    $sql = "DELETE FROM `sliderTable` WHERE id=$id";

    $query = mysqli_query($conn, $sql);

    if ($query) {
            header("Location:show.php");
    }else{
            echo "error";
    }

?>