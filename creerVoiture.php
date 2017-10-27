<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> My first PHP </title>
    </head>
   
    <body>
        	<?php
		  require_once '../Model/ModelVoiture.php';

	if(empty($_POST)){
		echo "no informations";
	}else{
        	  $car1=new ModelVoiture($_POST["marque"], $_POST["couleur"], $_POST["immatriculation"]);
                  $car1->save();
		  echo $car1->display();
	}
		?>
    </body>
</html> 
