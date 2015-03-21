<?php
/* Category Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/ttallate_engine.php");
  require_once("models/tipoalmacens.model.php");

  function run(){
    //htmlDatos, arreglo que contiene todas las substituciones
    // que se darán en la plantilla.

    $htmlDatos = array();
    $htmlDatos["tipoalmacenTitle"] = "";
    $htmlDatos["tipoalmacenMode"] = "";
    $htmlDatos["talid"] = "";
    $htmlDatos["taldsc"]="";
    $htmlDatos["taldir"]="";
    $htmlDatos["taltel"]="";
    $htmlDatos["actSelected"]="selected";
    $htmlDatos["inaSelected"]="";
    $htmlDatos["desSelected"]="";
    $htmlDatos["disabled"]="";


    if(isset($_GET["acc"])){
      switch($_GET["acc"]){
        //Manejando si es un insert
        case "ins":
          $htmlDatos["tipoalmacenTitle"] = "Ingreso de Nueva tipoalmacen";
          $htmlDatos["tipoalmacenMode"] = "ins";
          //se determina si es una acción del formulario
          if(isset($_POST["btnacc"])){
            $lastID = insertartipoalmacen($_POST);
            if($lastID){
              redirectWithMessage("¡tipoalmacen Ingresada!","index.php?page=tipoalmacen&acc=upd&talid=".$lastID);
            }else{
              //Se obtiene los datos que estaban en el post
              $htmlDatos["talid"] = $_POST["talid"];
              $htmlDatos["taldsc"]=$_POST["taldsc"];
              $htmlDatos["taldir"]=$_POST["taldir"];
              $htmlDatos["taltel"]=$_POST["taltel"];
              $htmlDatos["actSelected"]=($_POST["talest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($_POST["talest"] =="INA")?"selected":"";
              $htmlDatos["desSelected"]=($_POST["talest"] =="DES")?"selected":"";

            }
          }
          //si no es una acción del post se muestra los datos
          renderizar("tipoalmacen", $htmlDatos);
          break;
        //Manejando si es un Update
        case "upd":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(actualizartipoalmacen($_POST)){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡tipoalmacen Actualizada!","index.php?page=tipoalmacen&acc=upd&talid=".$_POST["talid"]);
            }
          }
          if(isset($_GET["undid"])){
            $tipoalmacen = obtenertipoalmacen($_GET["undid"]);
            if($tipoalmacen){
              $htmlDatos["tipoalmacenTitle"] = "Actualizar ".$tipoalmacen["taldsc"];
              $htmlDatos["tipoalmacenMode"] = "upd";
              $htmlDatos["talid"] = $tipoalmacen["talid"];
              $htmlDatos["taldsc"]=$tipoalmacen["taldsc"];
              $htmlDatos["talrtn"]=$tipoalmacen["taldir"];
              $htmlDatos["taltel"]=$tipoalmacen["taltel"];
              $htmlDatos["talest"]=$tipoalmacen["talest"];
              $htmlDatos["actSelected"]=($tipoalmacen["talest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($tipoalmacen["talest"] =="INA")?"selected":"";
              $htmlDatos["desSelected"]=($tipoalmacen["talest"] =="DES")?"selected":"";

              renderizar("tipoalmacen", $htmlDatos);
            }else{
              redirectWithMessage("¡tipoalmacen No Encontrada!","index.php?page=tipoalmacenes");
            }
          }else{
            redirectWithMessage("¡tipoalmacen No Encontrada!","index.php?page=tipoalmacenes");
          }
          break;
        //Manejando un delete
        case "dlt":
        if(isset($_POST["btnacc"])){
          //implementar logica de guardado
          if(borrartipoalmacen($_POST["talid"])){
            //forzando a que se actualice con los datos de la db
            redirectWithMessage("¡tipoalmacen Borrada!","index.php?page=tipoalmacenes");
          }
        }
          if(isset($_GET["talid"])){
            $tipoalmacen = obtenertipoalmacen($_GET["talid"]);
            if($tipoalmacen){
              $htmlDatos["tipoalmacenTitle"] = "¿Desea borrar ".$tipoalmacen["taldsc"] . "?";
              $htmlDatos["tipoalmacenMode"] = "dlt";
              $htmlDatos["talid"]=$tipoalmacen["talid"];
              $htmlDatos["taldsc"]=$tipoalmacen["taldsc"];
              $htmlDatos["taldir"]=$tipoalmacen["taldir"];
              $htmlDatos["taltel"]=$tipoalmacen["taltel"];
              $htmlDatos["talest"]=$tipoalmacen["talest"];
              $htmlDatos["actSelected"]=($tipoalmacen["talest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($tipoalmacen["talest"] =="INA")?"selected":"";
              $htmlDatos["desSelected"]=($tipoalmacen["talest"] =="DES")?"selected":"";

              $htmlDatos["disabled"]='disabled="disabled"';
              renderizar("tipoalmacen", $htmlDatos);
            }else{
              redirectWithMessage("¡tipoalmacen No Encontrada!","index.php?page=tipoalmacenes");
            }
          }else{
            redirectWithMessage("¡tipoalmacen No Encontrada!","index.php?page=tipoalmacenes");
          }
          break;
        defualt:
          redirectWithMessage("¡Acción no permitida!","index.php?page=tipoalmacenes");
          break;
      }
    }


  }

  run();
?>
