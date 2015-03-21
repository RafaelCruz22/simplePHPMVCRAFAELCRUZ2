<?php
/* almacen Controller
* 2015-03-05
* Created By OJBA
* Last Modification 2015-03-05 19:25:00
*/
require_once("libs/talmlate_engine.php");
require_once("models/almacenes.model.php");
function run(){
//htmlDatos, arreglo que contiene todas las substituciones
// que se darán en la plantilla.
$htmlDatos = array();
$htmlDatos["almacenTitle"] = "";
$htmlDatos["almacenMode"] = "";
$htmlDatos["almacenId"] = "";
$htmlDatos["almrzs"]="";
$htmlDatos["almnombre"]="";
$htmlDatos["almtmat"]="";
$htmlDatos["almnsubalm"]="";
$htmlDatos["almtel"]="";
$htmlDatos["almtel2"]="";
$htmlDatos["almidsalm"]="";
$htmlDatos["empid"]="";
$htmlDatos["disabled"]="";
if(isset($_GET["acc"])){
switch($_GET["acc"]){
//Manejando si es un insert
case "ins":
$htmlDatos["almacenTitle"] = "Ingreso de Nueva almacen";
$htmlDatos["almacenMode"] = "ins";
//se determina si es una acción del formulario
if(isset($_POST["btnacc"])){
$lastID = insertaralmacen($_POST);
if($lastID){
redirectWithMessage("¡almacen Ingresada!","index.php?page=almacen&acc=upd&almacenId=".$lastID);
}else{
  $htmlDatos["almid"] = $_POST["almid"];
  $htmlDatos["almrzs"]=$_POST["almrzs"];
  $htmlDatos["almnombre"]=$_POST["almnombre"];
  $htmlDatos["almtmat"]=$_POST["almtmat"];
  $htmlDatos["almsubalm"]=$_POST["almsubalm"];
  $htmlDatos["almtel"]=$_POST["almtel"];
  $htmlDatos["almtel2"]=$_POST["almtel2"];
  $htmlDatos["almidsalm"]=$_POST["almmidsalm"];
  $htmlDatos["almidemp"]=$_POST["almidemp"];

}
}
//si no es una acción del post se muestra los datos
renderizar("almacen", $htmlDatos);
break;
//Manejando si es un Update
case "upd":
if(isset($_POST["btnacc"])){
//implementar logica de guardado
if(actualizaralmacen($_POST)){
//forzando a que se actualice con los datos de la db
redirectWithMessage("¡almacen Actualizada!","index.php?page=almacen&acc=upd&almacenId=".$_POST["almacenId"]);
}
}
if(isset($_GET["almacenId"])){
$almacen = obteneralmacen($_GET["almacenId"]);
if($almacen){
$htmlDatos["almacenTitle"] = "Actualizar ".$almacen["almdsc"];
$htmlDatos["almacenMode"] = "upd";
// Esta funcion mergeArrayTo se encuentra en libs/utilities.php
// utiliza parametros por referencia se usa para llenar los
// datos comunes del primer arreglo segun llave en el segalmo
// si existen en el segalmo. Asi podemos compiar los datos almacenes directamente
// en el arreglo htmlDatos sin tener que estar escribiendo cada asignación.
mergeArrayTo($almacen , $htmlDatos);
$htmlDatos["almid"] = $almacen["almid"];
$htmlDatos["almrzs"]=$almacen["almrzs"];
$htmlDatos["almnombre"]=$almacen["almnombre"];
$htmlDatos["almtmat"]=$almacen["almtmat"];
$htmlDatos["almsubalm"]=$almacen["almsubalm"];
$htmlDatos["almtel"]=$almacen["almtel"];
$htmlDatos["almtel2"]=$almacen["almtel2"];
$htmlDatos["almidsalm"]=$almacen["almidsalm"];
$htmlDatos["almidemp"]=$almacen["almidemp"];
renderizar("almacen", $htmlDatos);
}else{
redirectWithMessage("¡almacen No Encontrada!","index.php?page=almacenes");
}
}else{
redirectWithMessage("¡almacen No Encontrada!","index.php?page=almacenes");
}
break;
//Manejando un delete
case "dlt":
if(isset($_POST["btnacc"])){
//implementar logica de guardado
if(borraralmacen($_POST["almacenId"])){
//forzando a que se actualice con los datos de la db
redirectWithMessage("¡almacen Borrada!","index.php?page=almacenes");
}
}

if(isset($_GET["almid"])){
  $almacen = obteneralmacen($_GET["almid"]);
  if($almacen){
    $htmlDatos["almacenTitle"] = "¿Desea borrar ".$almacen["almrzs"] . "?";
    $htmlDatos["almacenMode"] = "dlt";
    $htmlDatos["almid"]=$almacen["almid"];
    $htmlDatos["almrzs"]=$almacen["almrzs"];
    $htmlDatos["almnombre"]=$almacen["almnombre"];
    $htmlDatos["almtmat"]=$almacen["almtmat"];
    $htmlDatos["almsubalm"]=$almacen["almsubalm"];
    $htmlDatos["almtel"]=$almacen["almtel"];
    $htmlDatos["almtel2"]=$almacen["almtel2"];
    $htmlDatos["almidsalm"]=$almacen["almidsalm"];
    $htmlDatos["empid"]=$almacen["idemp"];
    $htmlDatos["disabled"]='disabled="disabled"';
    renderizar("almacen", $htmlDatos);
}else{
redirectWithMessage("¡almacen No Encontrada!","index.php?page=almacenes");
}
break;
defualt:
redirectWithMessage("¡Acción no permitida!","index.php?page=almacenes");
break;
}
}
}
run();
?>
