<?php

require_once "autoloader.php";

$gestion = new Gestion();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Marcas</h1>
    <form action="" method="post">
        <?php
        
        $brands = $gestion->getBrands();
        foreach ($brands as $brand) {
            echo '<input type="checkbox" name="marca" value="' . $brand['brandId'] . '">';
            echo $brand['brandName'] . '<br>';
        }
        ?>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>