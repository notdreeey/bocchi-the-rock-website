<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bocchi the Rock!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<link href="https://fonts.cdnfonts.com/css/promises-gisttela-script" rel="stylesheet">
	<link rel="icon" href="images/bocchiicon.jpg" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<?php
echo "<div align=CENTER>";
include_once('view/header.php');
echo "</div>";

echo "<div>";
include_once("controller/controller.php");
$controller = new Controller();
$controller->getPage();
echo "</div>";

echo "<div align='CENTER'>";
include_once('view/footer.php');
echo "</div>";
?>