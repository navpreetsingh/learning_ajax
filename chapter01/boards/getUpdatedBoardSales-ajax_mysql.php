<?php

/////////////////////
//
// This script assumes MySQL access.
//
// If you want to run this script yourself,
//   you need to do the following things:
//   1. Replace DB_HOST with the name of the server your database is on
//   2. Replace DB_USERNAME with your database login username
//   3. Replace DB_PASSWORD with your database password
//   4. Replace DB_NAME with the name of your MySQL database
//   5. Make sure your database schema is as follows:
//
// Table name: hraj_boardsrus
//   Column 1: boardsSold	(Type: INT)
//
// Insert into your table a single row, with the value 1012, to start.
//
// Remember, you really don't need this script to access a database to run
//   the book's examples. This is just for bonus credit!
//
///////////////////

// Connect to database
$conn = @mysql_connect("DB_HOST", "DB_USERNAME", "DB_PASSWORD");
if (!$conn)
  die("Error connecting to MySQL: " . mysql_error());

if (!mysql_select_db("DB_NAME", $conn))
  die("Error selecting Head First database: " . mysql_error());

$select = 'SELECT boardsSold';
$from   = '  FROM hraj_boardsrus';

$queryResult = @mysql_query($select . $from);
if (!$queryResult)
  die('Error retrieving total boards sold from database.');

while ($row = mysql_fetch_array($queryResult)) {
  $totalSold = $row['boardsSold'];
}

// Reflect new sales
srand((double)microtime() * 1000000);
$update = 'UPDATE hraj_boardsrus';
$set    = '   SET boardsSold = ' . ($totalSold + rand(0,10));
$where  = ' WHERE boardsSold = ' . $totalSold;
mysql_query($update . $set . $where);

echo $totalSold;

mysql_close($conn);

?>
