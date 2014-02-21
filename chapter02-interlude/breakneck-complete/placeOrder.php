<?php

?>

<html>
 <head>
  <title>Break Neck Pizza Delivery</title>
  <link rel="stylesheet" type="text/css" href="breakneck.css" />
 </head>


 <body>
  <p>
   <img src="breakneck-logo.gif" alt="Break Neck Pizza" />
  </p>
   <p>Your order will be delivered to:</p>
   <p class="customer-data">
<?php
   print str_replace("\n", "<br />", $address);
?>
   </p>
   <p>We have your order down as:</p>
   <p class="customer-data">
<?php
   print str_replace("\n", "<br />", $order);
?>
   </p>
 </body>
</html>
