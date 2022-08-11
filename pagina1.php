<?php
// $contador=$_REQUEST['contador'];
header('Content-Type: text/html; charset=utf-8');
$conexion = mysqli_connect("localhost", "root", "", "exam") or
die("Problemas con la conexión");

$registros = mysqli_query($conexion, "select id_question,questions
                    from question WHERE id_question=20  ") or
die("Problemas en el select:" . mysqli_error($conexion));

while ($reg = mysqli_fetch_array($registros)) {
   $id=$reg[0];
    if ($_REQUEST['cod']==1){
        
        echo '<h1>'.$reg[0].' '.$reg[1].'</h1>';
        echo "</br>";
        $respuestas = mysqli_query($conexion, "select id_question,result,value
                    from solutions  WHERE id_question=$id ") or
die("Problemas en el select:" . mysqli_error($conexion));
$r=0;

while ($reg1 = mysqli_fetch_array($respuestas)) {
$r++;
echo '

<input id="nombre" type="radio" name="nombre" value="'.$reg1[2].'"/>' ."'$reg1[1]'"."</br>";
 
}

echo '
<form action="pagina2.php" method="post" id="formulario">
  <input type="text" name="nombre" id="nombre" size="20"><br>
  
    <input type="submit" value="Enviar" id="en">
    <div id="resultados"></div>
    <a href="comentarios.txt">Ver resultados</a>
  </form>
';

    }
  
    }






//   echo "<strong>Aries:</strong> Hoy los cambios serán físicos, personales, de carácter, Te sentirás impulsivo y tomarás  iniciativas. Período en donde considerarás unirte a agrupaciones de beneficencia, o de ayuda a los demás.";

?>