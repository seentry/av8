<?php
require_once "autoloader.php";
session_start(); 

$mod = new Importar();
$marca = "volvo"

?>
<html>
    <body>
        <div>
            <?php
                $paco = $mod->getBrandId($marca);
                echo $paco;
            ?>
        </div>
    </body>
</html>
