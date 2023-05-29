<?php
echo "hello Webtech";
$host = 'localhost';
$port = '5432';
$dbname = 'mydb';
$user = 'postgres';
$password = 'postgres';

// Establish a connection to the PostgreSQL database
$dbcon = pg_connect("host =localhost port=5432 dbname=mydb user=postgres password=postgres");
  if (!$dbcon) {
     die('Could not connect: ' . pg_last_error());
  }

// Performing SQL query
$query = 'SELECT version()';
$result = pg_query($dbcon, $query) or die('Query failed: ' . pg_last_error());

// Printing results in HTML
echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";
?>
