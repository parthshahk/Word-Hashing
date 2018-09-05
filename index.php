<?php
    $this_app="Word_Hashing";
	
    $con=mysqli_connect("mysql.hostinger.in","u696737897_parth","`7w4]8io`aR8xu1AB1","u696737897_datab");
    $current_info_obj=mysqli_query($con,"SELECT * FROM visitors WHERE Alias='$this_app'");
    $current_info=mysqli_fetch_array($current_info_obj,MYSQLI_NUM);
    $current_users=$current_info[0];
    $current_views=$current_info[1];
    $current_usersN=$current_info[3];
    $current_viewsN=$current_info[4];
    $current_users++;
    $current_views++;
    $current_usersN++;
    $current_viewsN++;
    mysqli_query($con,"UPDATE visitors SET Views=$current_views,ViewsN=$current_viewsN WHERE Alias='$this_app'");

    if(!isset($_COOKIE['parthshahk_'.$this_app.'_visit'])){

        setcookie('parthshahk_'.$this_app.'_visit', '1', time() + 2592000, "/");
        mysqli_query($con,"UPDATE visitors SET Users=$current_users,UsersN=$current_usersN WHERE Alias='$this_app'");
    }
?>
<html>
    <head>
        <title>Word Hashing</title>
        <meta charset="utf-8">
        <meta name="description" content="A hash function usually returns a hexadecimal value. Here in Word Hashing the function returns a set of 4 English words instead of a seemingly arbitrary set of characters. These words are selected by the program from a huge database of words using an existing hashing algorithm.">
        <meta name="keywords" content="word hashing, hashing, hash function, parth shah">
        <meta name="robots" content="index, follow">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="https://parthshah.xyz/resources/favicons/word_hashing.png">
        <link rel="stylesheet" href="https://parthshah.xyz/resources/css/materialize.css">
        <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
        <style>
            .nav-wrapper{
                background-color: #00ADA9;
                height: 100px !important;
            }
            .nav-wrapper img{
                margin-top: 17px;
            }
            .container{
                margin-top: 50px;
                color: #474143;
            }
            .start{
                font-size: 1.3rem;
            }
            #text{
                width: 100%;
                height: 3.5rem;
                border: 1px solid #CCCCCC;
                font-size: 1.5em;
                margin-top: 15px;
            }
            #text:focus{
                box-shadow: 1px 1px 2px 0px #DDDDDD;
            }
            .word-row{
                margin-top: 45px;
                padding: 10px;
                width: 100%;
                font-size: 2em;
                background-color: #FF6444;
                color: #FFFFFF;
                font-family: 'Anton';
                word-spacing: 1em;
                line-height: 1.4em;
            }
            .bottom{
                width: 100%;
                word-spacing: 0.1em;
                margin-top: 7em;
                margin-bottom: 0px;
            }
            .learn{
                font-size: 1.1em;
            }
            .back{
                font-size: 0.9em;
            }
        </style>
    </head>
    <body>
        <nav>
            <div class="nav-wrapper">
                <a href="index.php" class="brand-logo center"><img src="https://parthshah.xyz/resources/images/word_hashing_header.png" height="70px"></a>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col s12 center">
                    <h5 class="start">Start typing below...</h5>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <input type="text" id="text" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row word-row center">
            <div class="col s12">
                <span id="out">Hash Words Appear Here</span>
            </div>
        </div>
        <div class="row bottom center">
            <div class="col s12">
                <p class="learn">What is this? <a href="learn.html"> Click Here</a> to learn.</p>
                <p class="back">Go back to <a href="https://parthshah.xyz">Parth Shah - Projects</a></p>
            </div>
        </div>
        <script src="https://parthshah.xyz/resources/javascript/jquery_3.2.1.js"></script>
        <script src="https://parthshah.xyz/resources/javascript/materialize.js"></script>
        <script>
            function getWords(){
                str=document.getElementById("text").value;
                if(str.length==0){
                    document.getElementById("out").innerHTML="Hash Words Appear Here";
                    return;
                }else{
                    var xmlhttp=new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function(){
                    if(this.readyState==4&&this.status==200){
                        document.getElementById("out").innerHTML=this.responseText;
                    }
                };
                xmlhttp.open("GET", "getwords.php?q="+str, true);
                xmlhttp.send();
                }
            }
            document.getElementById("text").addEventListener("keyup", getWords);
        </script>
    </body>
</html>