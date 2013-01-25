<?php
$host="localhost";
$user="sbk";
$pwd="19061995";
$db=mysql_connect($host,$user,$pwd);
mysql_select_db("ivensart",$db);
$i=1;

$result = mysql_query("SELECT * FROM dle_post WHERE filename = ''") or die("Запрос не выполнен");
print ( '<table>' );
             if (mysql_num_rows($result)>0) 
                 {
                     while ($row = mysql_fetch_assoc($result))
                     {
                     $sqlname=$row["title"];
                     
					 if ($sqlname != NULL)
                     {
					      
          if (++$i%2 == 0) 
		 print ( "<tr><td>$sqlname</td>" );
       
           else
         print ( "<td>$sqlname</td></tr>" );

                     }

                     }
                 }


print ( '</table>' );




?>