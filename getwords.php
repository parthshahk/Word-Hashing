<?php
    $hash=$_GET['q'];
    $hash=md5($hash);
    $i=str_split($hash,4);

    $index1 = floor(hexdec($i[0])*5.50);
    $index2 = floor(hexdec($i[1])*5.50);
    $index3 = floor(hexdec($i[2])*5.50);
    $index4 = floor(hexdec($i[3])*5.50);

    // $con = mysqli_connect("localhost","parth","parth","test");
    $con=mysqli_connect("mysql.hostinger.in","u696737897_parth","`7w4]8io`aR8xu1AB1","u696737897_datab");

    $sql = "SELECT * FROM wordhash WHERE ID = $index1 OR ID = $index2 OR ID = $index3 OR ID = $index4";
    $result = mysqli_query($con, $sql);

    while($row = mysqli_fetch_assoc($result)) {

        echo $row['Word']." ";
     }
?>