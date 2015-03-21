<?php
/* tipoalmacen Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/tipoalmacenes.model.php");

  function run(){
    $tipoalmacenes = array();
    $tipoalmacenes = obtenertipoalmacenes();
    renderizar("tipoalmacenes", array("tipoalmacenes" => $tipoalmacenes));
  }

  run();
?>
