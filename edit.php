<?php 

include "config.php";

if (!isset($_GET["id"])) {
    header("Location:show.php");
}
$id = $_GET["id"];

$sql = "SELECT `src` , `text` , `desc` FROM `sliderTable` WHERE id=$id";

$query = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($query);
    
?>

 <!doctype html>
 <html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Untitled</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="author" href="humans.txt">
    </head>     
    <body>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="text" name="text" placeholder="text" value="<?= $row['text']?>"> <br>
            <input type="text" name="desc" placeholder="desc" value="<?= $row['desc']?>"> <br>
            <input type="text" name="src" placeholder="src" value="<?= $row['src']?>" ><br>
            <input type="submit" name="submit" value="Update">
        </form>

        <script src="js/main.js"></script>
    </body>
 </html>