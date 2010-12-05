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
    width:960px;
    font:13px/22px "Helvetica neue", Helvetica, Arial, sans-serif;
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
  </style>
</head>

<body>
  
  <header>
    <h1>Citas</h1>
  </header>
  
  <section id="add-form">
  <form id="add-cita" method="post" action="agregar.php">
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
      <h2>Citas que he agregado:</h2>
    </header>
   
  </section>
  
</body>

</html>