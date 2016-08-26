<?php 
    include "config.php";
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add</title>
</head>
<body>
    
    <?php 
        if (isset($_POST['submit'])) {
            $text = $_POST['text'];
            $desc = $_POST['desc'];
            $src =  "images/" . basename($_FILES["sekil"]["name"]);
            $sql = "INSERT INTO `sliderTable`(`text` , `desc` , `src`) VALUES ('$text' , '$desc' , '$src')";
            print_r($sql);
            $query = mysqli_query($conn, $sql);
            
            
            $cavid =  $_FILES["sekil"]["name"];

            $target_dir = "images/";

            $target_file = $target_dir . basename($_FILES["sekil"]["name"]);

            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            if ($imageFileType == 'jpg' || $imageFileType == 'png'|| $imageFileType == 'gif') {
                if ($_FILES['sekil']['size'] < 500*1024) {
                    move_uploaded_file($_FILES["sekil"]["tmp_name"] , $target_file);
                } else {
                    echo 'olçu boyukdu max 500 kb';
                }
            } else {
                echo 'bu fayl ' . $imageFileType;
            }

            fclose($file);
            header('Location:index.php');
            if ($query) {
                header("Location:show.php");
            }
        }
    ?>
</body>
</html>