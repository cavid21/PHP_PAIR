<!doctype html>
<html>
    <head>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Untitled</title>
        <style>
            img{
                width: 50px;
                height: 50px;
            }
        </style>
    </head>
    <body>
        <table border="1">
            <thead>
                <tr>
                    <th>id</th>
                    <th>src</th>
                    <th>image</th>
                    <th>text</th>
                    <th>desc</th>
                    <th>delete</th>
                    <th>update</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include "config.php";

                    $sql = "SELECT * FROM `sliderTable`";
                    $query = mysqli_query($conn, $sql);

                    if ($query) {
                        while($row = mysqli_fetch_assoc($query)){
                            echo "<tr>";
                                echo"<td>".$row['id']."</td>";
                                echo"<td>".$row['src']."</td>";
                                echo"<td><img src=" .$row['src']. "></td>";
                                echo"<td>".$row['text']."</td>";
                                echo"<td>".$row['desc']."</td>";
                                echo"<td><a href='delete.php?id=".$row['id']."'>delete</a></td>";
                                echo"<td><a href='edit.php?id=".$row['id']."'>edit</a></td>";
                            echo "</tr>";
                        }
                    }
                  ?>
            </tbody>
        </table>
        <br><br>
        <form action="add.php" method="post" enctype="multipart/form-data">
            <input type="text" name="text" placeholder="text"> <br>
            <input type="text" name="desc" placeholder="desc"> <br>
            <input type="file" name="sekil"> <br>
            <br>
            <input type="submit" value="add" name="submit">
        </form>
    </body>
</html>

