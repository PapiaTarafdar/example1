<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
 <h2> Welcome to the Product Page </h2>
 <h4> Product Name:<?php echo $name;  ?></h4>

 <h4> Product List:</h4>
 <ul>
	 <?php foreach($prod_list as $item): ?>
	 <li><?= $item;  ?> </li>
	 <?php endforeach;?>
 </ul>	 



 <!--<script type="text/javascript">
     var jsonData = <?php echo $name; ?>
   </script>
<h4>Some_data= <?= $name; ?></h4>-->
</body>
</html>

