<?php 
include "config.php";

if (isset($_POST)) {
    $id = $_POST['id'];
    $text = $_POST['text'];
    $desc = $_POST['desc'];
    $src = $_POST['src'];


    $sql = "UPDATE `sliderTable` SET `text`='$text' ,`desc`='$desc' , `src`='$src' WHERE id = $id";

    $query = mysqli_query($conn,$sql);
    if ($query) {
            header("Location:show.php");
    }else {
            echo "error";
    }
}

 ?>