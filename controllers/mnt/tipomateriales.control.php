<?php
/* Categorias Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/template_engine.php");

  require_once("models/tipomateriales.model.php");

  function run(){
    $tipomateriales = array();
    $tipomateriales = obtenertipomateriales();
    renderizar("tipomateriales", array("tipomateriales" => $tipomateriales));
  }

  run();
?>
