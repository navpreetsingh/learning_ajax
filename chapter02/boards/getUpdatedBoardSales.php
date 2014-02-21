<?php

// Start with an arbitrary number of boards sold
$totalSold = 1012;

// Reflect new sales
srand((double)microtime() * 1000000);
$totalSold = $totalSold + rand(0,1000);

$price = 249.95;
$cost = 84.22;
$cashPerBoard = $price - $cost;
$cash = $totalSold * $cashPerBoard;

?>

<html>
 <head>
  <title>Boards 'R' Us</title>
  <link rel="stylesheet" type="text/css" href="boards.css" />
 </head>

 <body>
  <h1>Boards 'R' Us :: Custom Boards Report</h1>
  <div id="boards">
   <table>
    <tr><th>Snowboards Sold</th>
     <td><span id="boards-sold">
<?php
  print $totalSold;
?>
    </span></td></tr>
    <tr><th>What I Sell 'em For</th>
     <td>$<span id="price">
<?php
  print $price;
?>
    </span></td></tr>
    <tr><th>What it Costs Me</th>
     <td>$<span id="cost">
<?php
  print $cost;
?>
     </span></td></tr>
   </table>
   <h2>Cash for the Slopes: 
    $<span id="cash">
<?php
  print $cash;
?>
    </span></h2>
   <form method="GET" action="getUpdatedBoardSales-orig.php">
    <input value="Show Me the Money" type="submit" />
   </form>
  </div>
 </body>
</html>
