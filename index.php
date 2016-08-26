<!DOCTYPE html>
<html>
<head>
    <title>JS</title>
    <style type="text/css">
        .hide {
            display: none;
        }
        #sliderFrame
        {
                width: 900px;
                margin: 0 auto;
        }
        .sliderFrame , .imgFrame , .descFrame
        {
                width: 100%;
        }
        .imgFrame img
        {       
                width: 100%;
                margin: 0;
                height: 400px;
        }
        .imgFrame
        {
                
                margin: 0;
                height: 100%;
        }
        .descFrame
        {
                padding: 10px 20px;
                width:calc(100% - 40px);
                background: lightgray;
                color: blue;
        }
        .descFrame 
        {
                margin: 0;
        }
        .btns button 
        {
                cursor: pointer;
                border: none;
                background: gray;
                padding: 10px 30px;
        }
        .btns button:last-child
        {
                float: right;
        }
</style>
<script src='js/jquery.min.js'> </script>
</head>
<body>
    <section id="sliderFrame">
        <div class="imgFrame">
                <?php 
                include "config.php";
                $sql = "SELECT `src` FROM `sliderTable`";
                $query = mysqli_query($conn, $sql);
                $src = [];
                if ($query) {
                    while($row = mysqli_fetch_assoc($query)){
                        array_push($src , $row['src']);
                    }
                }
                for ($i = 0; $i < sizeof($src); $i++) {
                    ?><img src="<?=$src[$i]?>" class='hide'>
                    <?php
                }
                ?>   
        </div>
        <div class="descFrame">
                 <?php 
                include "config.php";
                $sql = "SELECT `text` FROM `sliderTable`";
                $query = mysqli_query($conn, $sql);
                $text = [];
                if ($query) {
                    while($row = mysqli_fetch_assoc($query)){
                        array_push($text , $row['text']);
                    }
                }
                for ($i = 0; $i < sizeof($text); $i++) {
                    ?><p class='hide'><?=$text[$i]?></p>
                    <?php
                }
                ?>   
        </div>
        <div class="btns">
                <button onclick="prev()">prev</button>
                <button onclick="next()">next</button>
                <button onclick="stop()">pause</button>
        </div>
    </section>
 
    <script type="text/javascript">
      
    descArray = ["image 1" , "image 2" , "image 3" , "image 4"];
  
    var count = 0;
    var stop = false;
    var imgs = $('img');
    var texts = $('p');
    $(imgs[0]).removeClass('hide');
    $(texts[0]).removeClass('hide');
    function prev() 
    {
        $(imgs[count]).addClass('hide');
        $(texts[count--]).addClass('hide');
        if (count < 0) 
        {
            count = imgs.length - 1;
        }
        $(imgs[count]).removeClass('hide');
        $(texts[count]).removeClass('hide');
    }
    function next() 
    {
        $(imgs[count]).addClass('hide');
        $(texts[count++]).addClass('hide');
        if (count == imgs.length) 
        {
            count = 0;
        }
        $(imgs[count]).removeClass('hide');
        $(texts[count]).removeClass('hide');
    }
    interval = setInterval(next , 1000);
   
    function stop() 
    {
        clearInterval(interval);
        interval = 0;
    }
   
    </script>
</body>
</html>
