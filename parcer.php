<?php


$ch = curl_init ();
curl_setopt ($ch , CURLOPT_URL , "http://fs.ua/video/?view=list");
curl_setopt ($ch , CURLOPT_USERAGENT , "Mozilla/5.0");
curl_setopt ($ch , CURLOPT_RETURNTRANSFER , 1 );
$content = curl_exec($ch);
curl_close($ch);

preg_match_all('|<a href="(.*)/item/(.*)</a>|U', $content, $matches, PREG_PATTERN_ORDER);

print_r($matches);


?>