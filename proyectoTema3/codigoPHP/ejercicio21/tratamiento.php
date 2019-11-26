


<!--autor ismael heras-->

<!--ejercici21
Construir un formulario para recoger un cuestionario realizado a una persona y enviarlo a una página Tratamiento.php para que muestre
las preguntas y las respuestas recogidas-->


<?php



    
     
            $numero1 = $_POST['numero1'];
            $numero2 = $_POST['numero2'];

           
            echo "numero1: " . $numero1 . '<br>';
            //muestra por pantalla el numero recogido por la variable $_POST.
            echo "numero2: " . $numero2 . '<br>';
            
            $suma = $numero1+$numero2;
          
            echo "La suma de los 2 numeeros es: " . $suma .'<br>';
    


?>

