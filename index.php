<?
$id = $_POST['id'];
$cita = $_POST['cita'];
$autor = $_POST['autor'];
$fuente = $_POST['fuente'];
mysql_connect('localhost', 'yamilgplayground', 'Ezequiel18') or die("No se pudo conectar, damn!");
mysql_select_db('citas') or die("No se pudo seleccionar la db.");

// Con este query se escriben los datos.
$sqlquery = "INSERT INTO citas VALUES('$cita','$autor','$fuente','$id')";

// El if es para evitar que se los datos se manden vacios cuando se carge la pagina
if (!empty($_POST['cita'])) {
   mysql_query($sqlquery);
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
  <style type="text/css"> 
  {
    margin:0;
    padding:0;
  }
  
  header,footer {
    display:block;
  }
  
  a {
    text-decoration:none;
  }
  
  footer p {
    text-align:center;
    color:red;
  }
  
  body {
    margin:0 auto;
    width:640px;
    font:13px/22px Cambria, Helvetica, Arial, sans-serif;
    color:#333;
  }
  
  h1 {
    font-size:2.5em;
  }
  
  h1 {
    text-align:center;
   
  }
  
  #cita {
    display:block;
    width:98%;
  }
  form input, textarea {
    padding:5px;
    border-radius: 5px;
    margin:5px;
    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, arial, sans-serif; 
    font-weight: 300;
    font-size:1.4em;
    border: 1px solid #E4E4E4;
  }
  
  form textarea {
    margin:10px 0 12px 0;
    padding:10px;
  }
  
  blockquote {
    font-family:Cambria, serif;
    font-size:1.5em;
    text-align:center;
    color:#333;
    line-height:1.4em;
    margin-top:-20px;
  }
  
  #view-citas dl dd {
    text-align:center;
    margin-bottom:-20px;
  }
  
 
  form fieldset {
    border:none;
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
    margin:50px;
  }
  
  /* fuente del siguiente codigo: http://ubuwaits.github.com/css3-buttons/ junto con mis respetos*/
    
    #add-cita input[type='submit'] {
      background: #29C636;
      background: -moz-linear-gradient(0% 100% 90deg, #00890B 0%, #00B50F 50%, #29C636 50%, #2EEE3E 100%);
      background: -webkit-gradient(linear, 0 0, 0 100%, color-stop(0, #2EEE3E), color-stop(0.5, #29C636), color-stop(0.5, #00B50F), color-stop(1, #00890B));
      border: 1px solid #00950C;
      -moz-border-radius: 5px;
      -webkit-border-radius: 5px;
      border-radius: 5px;
      -moz-box-shadow: inset 0px 0px 0px 1px rgba(100, 255, 113, 0.4), 0 1px 3px #333;
      -webkit-box-shadow: inset 0px 0px 0px 1px rgba(100, 255, 113, 0.4), 0 1px 3px #333;
      box-shadow: inset 0px 0px 0px 1px rgba(100, 255, 113, 0.4), 0 1px 3px #333;
      color: #fff;
      font-size: 1.2em;
      font-weight: bold;
      letter-spacing: 1px;
      line-height: 1em;
      padding: 7px 0 8px 0;
      text-align: center;
      text-shadow: 0px -1px 1px rgba(0, 0, 0, .5);
      width: 118px;
    }

    #add-cita input[type='submit']:hover {
      background: #00CB11;
      background: -moz-linear-gradient(0% 100% 90deg, #01A20E 0%, #00CB11 50%, #4DDB59 50%, #73F37E 100%);
      background: -webkit-gradient(linear, 0 0, 0 100%, color-stop(0, #73F37E), color-stop(0.5, #4DDB59), color-stop(0.5, #00CB11), color-stop(1, #01A20E));
    }

    #add-cita input[type='submit']:active {
      background: #00B30F;
      background: -moz-linear-gradient(0% 100% 90deg, #007009 0%, #009C0D 50%, #24AD2F 50%, #28D436 100%);
      background: -webkit-gradient(linear, 0 0, 0 100%, color-stop(0, #28D436), color-stop(0.5, #24AD2F), color-stop(0.5, #009C0D), color-stop(1, #007009));
      -moz-box-shadow: inset 0px 0px 0px 1px rgba(255, 115, 100, 0.4);
      -webkit-box-shadow: inset 0px 0px 0px 1px rgba(255, 115, 100, 0.4);
      box-shadow: inset 0px 0px 0px 1px rgba(255, 115, 100, 0.4);
    }
    
    /*sacado del CSS3 for Web Designers */
    @-webkit-keyframes pulse {
    	0% {
    		-webkit-box-shadow: 0 0 12px rgba(51,204,255,.2);
    	}
    	50% {
    		-webkit-box-shadow: 0 0 12px rgba(51,204,255,.9);
    	}
    	100% {
    		-webkit-box-shadow: 0 0 12px rgba(51,204,255,.2);
    	}
    }

    @-webkit-keyframes pulse-error {
    	0% {
    		-webkit-box-shadow: 0 0 12px rgba(204,0,0,.1);
    	}
    	50% {
    		-webkit-box-shadow: 0 0 12px rgba(204,0,0,.5);
    	}
    	100% {
    		-webkit-box-shadow: 0 0 12px rgba(204,0,0,.1);
    	}
    }

    #add-cita fieldset input[type="text"]:focus {
    	-webkit-animation: pulse 1.5s infinite ease-in-out;
    	}
  
  </style>
</head>

<body>
  
  <header>
    <h1>&lt;Citas&gt;</h1>
  </header>
  
  <section id="add-form">
  <form id="add-cita" method="post" action="<? echo $PHP_SELF;?>">
  <input type="hidden" name="id" value="NULL">
    <fieldset>
      <legend>Agregar cita:</legend>
        <textarea id="cita" name="cita" required autofocus placeholder="Aqu&iacute; es donde se ingresan las citas"></textarea>
    <!-- agregar el autofocus luego -->
    <label for="autor">Autor:</label>
    <input type="text" id="autor" name="autor" required placeholder="¿Qui&eacute;n lo escribi&oacute;?">
    <label for="fuente">Fuente:</label>
    <input type="text" id="fuente" name="fuente" placeholder="¿De d&oacute;nde lo saqu&eacute;?">
    <input type="submit" value="Agregar">
    </fieldset>
  </form>
  
  </section>
  
  <section id="view-citas">
<hr>
    <?  $i=$num-1; while ($i >= 0) {
      $mostrar_cita = mysql_result($resultados, $i, 'citas');
      $mostrar_autor = mysql_result($resultados, $i, 'autor');
      $mostrar_fuente = mysql_result($resultados, $i, 'fuente');
      echo "<dl>
              <dt><blockquote>&ldquo; $mostrar_cita &rdquo;</blockquote><dt> 
              <dd><p>$mostrar_autor </p></dd>
              <dd><p>$mostrar_fuente </p></dd>
            <dl> <hr>";
    $i--;
    }
   
 ?>
  </section>
  <footer>
    <p>tl;dr warning</p>
    
  </footer>
  
  <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-20082815-1']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

  </script>
  
</body>

</html>