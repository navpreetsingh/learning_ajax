<?php

// Start with an arbitrary number of boards sold
$totalSold = 1012;

// Reflect new sales
srand((double)microtime() * 1000000);
$totalSold = $totalSold + rand(0,1000);

echo $totalSold;

?>
