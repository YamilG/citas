<?
$id = $_POST['id'];
$citas = $_POST['cita'];
$autor = $_POST['autor'];
$fuente = $_POST['fuente'];
mysql_connect('localhost', 'root', 'root') or die("No se pudo conectar, damn!");
mysql_select_db('citas') or die("No se pudo seleccionar la db.");

$sqlquery = "INSERT INTO citas VALUES('$citas','$autor','$fuente','$id')";

mysql_query($sqlquery);
mysql_close();

echo "Los valores fueron introducidos.";

?>

