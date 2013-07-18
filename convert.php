<?php

$handle = fopen('words.txt',"a");
$dictionary = file('dictionary.txt');
//print_r ($dictionary);

    for ($i = 0; $i < count($dictionary); $i++) {


       preg_match('/^[A-ZА-Я]{3,}(\s|.)[A-ZА-Я]+[^a-zа-я][A-ZА-Я]+[^a-zа-я]/u', $dictionary[$i], $result);

       if(count($result) < "1") {
            preg_match('/^[A-ZА-Я]{3,}(\s)/u', $dictionary[$i], $result);
       }

        $result2 = str_replace($result[0], "", $dictionary[$i]);

        $re12 = addslashes($result2);
        $re1 = addslashes($result[0]);

        $text = "INSERT INTO `words`(`word`, `description`) VALUES ('" . $re12 . "','" . $re1 . "');";
        fwrite($handle, $text);

        //print_r ($result[0]. "|");
        //print_r ();
    }

fclose($handle);
?>