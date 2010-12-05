<?
$id = $_POST['id'];
$cita = $_POST['cita'];
$autor = $_POST['autor'];
$fuente = $_POST['fuente'];
mysql_connect('localhost', 'root', 'root') or die("No se pudo conectar, damn!");
mysql_select_db('citas') or die("No se pudo seleccionar la db.");

// Con este query se escriben los datos.
$sqlquery = "INSERT INTO citas VALUES('$cita','$autor','$fuente','$id')";

// El if es para evitar que se los datos se manden vacios cuando se carge la pagina
if (!empty($_POST['cita'])) {
   mysql_query($sqlquery);
   echo "Los valores fueron introducidos.";
}

// la db ya esta seleccionado ahora se selecciona todo de la tabla
$sqlquery2 = "SELECT * FROM citas";
// el query no se ejecuta por defecto sino que se almacena en una variable
$resultados = mysql_query($sqlquery2) or die(mysql_error());
// $num sirve para saber cual es el limite de filas en la tabla
$num = mysql_num_rows($resultados);

mysql_close();

?>

<!DOCTYPE html>
<html lang="es-419">
<head>
  <meta charset="utf-8">
  <title>Citas</title>
  <meta name="description" content="Mi repositorio personal de citas.">
  <meta name="author" content="Yamil Gonzales">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--<link rel="stylesheet" href="css/style.css">-->
  <style type="text/css"> 
  {
    margin:0;
    padding:0;
  }
  
  header {
    display:block;
  }
  
  body {
    margin:0 auto;
    width:640px;
    font:13px/22px Cambria, Helvetica, Arial, sans-serif;
    color:#333;
  }
  
  #cita {
    display:block;
    width:98%;
  }
  form input, textarea {
    padding:5px;
    border-radius: 5px;
    margin:5px;
  }
  
  blockquote {
    font-style:italic;
    font-family:Cambria, serif;
    font-size:1.5em;
    text-align:center;
  }
  
  #view-citas dl dd {
    text-align:right;
  }
  
  hr {
    color: #f00;
    background-color: #999;
    background: -webkit-gradient(
        linear,
        left top,
        right top,
        color-stop(0.26, rgb(255,255,255)),
        color-stop(0.5, rgb(128,128,128)),
        color-stop(0.82, rgb(252,255,255))
    );
    background: -moz-linear-gradient(
        left center,
        rgb(255,255,255) 26%,
        rgb(128,128,128) 50%,
        rgb(252,255,255) 82%
    );
    height: 1px;
    border:0;
  }
  
  </style>
</head>

<body>
  
  <header>
    <h1>Citas</h1>
  </header>
  
  <section id="add-form">
  <form id="add-cita" method="post" action="<? echo $PHP_SELF;?>">
  <input type="hidden" name="id" value="NULL">
    <fieldset>
      <legend>Agregar nueva cita.</legend>
    <label for="cita">Cita:</label>
    <textarea id="cita" name="cita" required placeholder="Cita que quiero agregar..."></textarea>
    <!-- agregar el autofocus luego -->
    <label for="autor">Autor:</label>
    <input type="text" id="autor" name="autor" required placeholder="Juan Perez">
    <label for="fuente">Fuente:</label>
    <input type="text" id="fuente" name="fuente" required placeholder="De donde lo saque">
    <input type="submit" value="Agregar">
    </fieldset>
  </form>
  
  </section>
  
  <section id="view-citas">
    <header>
      <h2>Colección:</h2>
    </header>
    <?  $i=0; while ($i < $num) {
      $mostrar_cita = mysql_result($resultados, $i, 'citas');
      $mostrar_autor = mysql_result($resultados, $i, 'autor');
      $mostrar_fuente = mysql_result($resultados, $i, 'fuente');
      echo "<dl>
              <dt><blockquote>&ldquo; $mostrar_cita &rdquo;</blockquote><dt> 
              <dd><p>$mostrar_autor </p></dd>
              <dd><p>$mostrar_fuente </p></dd>
            <dl> <hr>";
    $i++;
    }
   
 ?>
  </section>
  
</body>

</html>