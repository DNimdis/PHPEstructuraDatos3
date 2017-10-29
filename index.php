<?php

if($_SERVER['REQUEST_METHOD']=='GET'){

}else{

$resultado="No se encontro ninguna instrucción";
  if($fp = fopen($_FILES['fileTXT']['name'], "r")){
    $i=1;
    $lista=[];
    $instrucciones="";
    while(!feof($fp)) {
      $linea = fgets($fp);

      if (!empty($linea)) {
        if ($i==1) {
          # code....
          $longCaden=$linea;
        }elseif ($i==4) {
          # code...
          $mensaje=$linea;
        }else{
            array_push($lista ,trim($linea));
        }

      }
      $i++;
    }
      $tamano= explode(" ", $longCaden);
      $deco_str= preg_replace("/(.)\\1+/", "$1", $mensaje);


    if(strlen($lista[0]) == $tamano[0]){

      if (strlen($lista[1]) == $tamano[1] ) {


        for ($i=0; $i < sizeof($lista) ; $i++) {

          if(strpos($deco_str,preg_replace("/(.)\\1+/", "$1", $lista[$i]))){
          $resultado ="Si se encontro la instruccion: ".$lista[$i]." ";
          break;

          }else {
            $resultado = "El mensaje no contiene instrucciones";

          }


        }

      }else {
        # code...
        $resultado="la cantidad de caracteres de la segunda instruccion, no es igual a la logitud proporcionada";
      }
    }else {
      $resultado="la cantidad de caracteres de la primera instruccion, no es igual a la logitud proporcionada";
    }


  }else{
    echo "<script> alert('No se encontro el archivo'); </script>";
  }

}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Competencia</title>
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Poiret+One" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
  integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
  <div class="container" align="center">


    <div class="container">
      <br><br><br>
      <div class="col-sm-12">
        <form class="" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" accept-charset="iso-8859-1">
          <label for="" class="etiqueta">Selecionar Archivo</label>
          <input type="file" name="fileTXT" id="fileTXT" style="display: inline;" accept="text/plain" required>
          <button type="submit" name="btn btn-primary">iniciar</button>
        </form>
         <h1 style="font-family: 'Kaushan Script', cursive;">Resultado de la busqueda</h1>
         <h3><?php echo empty($resultado)? ".... .... .... .... .... .... .... ....":$resultado; ?></h3>
      </div>
    </div>


  </div>


</body>
<style media="screen">
body {
  background-color: #304FFE;
  overflow-x: hidden;
  font-family: 'Poiret One', cursive;
}
table{
  color:rgb(255,255,255);
}

table tr td{
  align-items: center;
}
td {
  align-items: center;
}
h3{
  color:rgb(255,255,255);
}
.etiqueta {
  background-color: orange;

}
input {
  padding-right: 0;
  background-color: #1CC0FE ;
}


</style>
</html>
