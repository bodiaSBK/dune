<?php
header( 'Content-Type: text/html; charset=cp1251' );

include 'connect.php';

$i=1;

$result = mysql_query("SELECT filename, title FROM dle_post") or die("Запрос не выполнен");
print ( '<table>' );
             if (mysql_num_rows($result)>0) 
                 {
                     while ($row = mysql_fetch_assoc($result))
                     {
                     $sqlname=$row["title"];
                     
					 if ($row["filename"] != NULL)
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