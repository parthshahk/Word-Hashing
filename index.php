<html>
    <head>
        <?php include '../analytics.php'; ?>
        <title>Word Hashing</title>
        <meta charset="utf-8">
        <meta name="description" content="A hash function usually returns a hexadecimal value. Here in Word Hashing the function returns a set of 4 English words instead of a seemingly arbitrary set of characters. These words are selected by the program from a huge database of words using an existing hashing algorithm.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="favicon.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
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
                <a href="./" class="brand-logo center"><img src="word-hashing-header.png" height="70px"></a>
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
                <p class="learn">What is this? <a href="learn.php"> Click Here</a> to learn.</p>
                <p class="back">Go back to <a href="https://parthshah.xyz">Parth Shah - Projects</a></p>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
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