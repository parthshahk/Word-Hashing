<?php
    $data= file_get_contents('words_dictionary.json');
    $data = json_decode($data, true);
    $words=array_keys($data);
    $hash=$_GET['q'];
    $hash=md5($hash);
    $i=str_split($hash,4);
    echo $words[hexdec($i[0])*5.56]." ".$words[hexdec($i[1])*5.56]." ".$words[hexdec($i[2])*5.56]." ".$words[hexdec($i[3])*5.56];
?>