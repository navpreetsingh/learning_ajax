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
// Table name: hraj_breakneck
//   Column 1: phone	(Type: VARCHAR(15))
//   Column 2: name	(Type: VARCHAR(100))
//   Column 3: street1	(Type: VARCHAR(100))
//   Column 4: city	(Type: VARCHAR(25))
//   Column 5: state	(Type: VARCHAR(20))
//   Column 6: zipCode	(Type: VARCHAR(10))
//
// Insert into your table several rows like this to start:
//
// 2148760976, Doug Henderson, 7804 Jumping Hill Lane, Dallas, Texas, 75218
// 2142908762, Mary Jenkins, 7081 Teakwood #24C, Dallas, Texas, 75182
// 7852215645, John Jacobs, 234 East Rutherford Drive, Topeka, Kansas, 66608
// 7853485412, Happy Traum, 876 Links Circle, Topeka, Kansas, 66608
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
  die("Error selecting database: " . mysql_error());

$phone = preg_replace("/[\. \(\)\-]/", "", $_REQUEST['phone']);
$select = 'SELECT *';
$from   = '  FROM hraj_breakneck';
$where  = ' WHERE phone = \'' . $_REQUEST['phone'] . '\'';
$queryResult = @mysql_query($select . $from . $where);
if (!$queryResult)
  die('Error retrieving customer from the database.');

$num = mysql_num_rows($queryResult);
if ($num == 0) {
  $queryResult = @mysql_query($select . $from);
}

while ($row = mysql_fetch_array($queryResult)) {
  echo $row['name'] . "\n" .
       $row['street1'] . "\n" .
       $row['city'] . ", " .
       $row['state'] . " " .
       $row['zipCode'];
}

mysql_close($conn);
?>
