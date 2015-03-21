<?php
/* Category Controller
 * 2015-03-05
 * Created By OJBA
 * Last Modification 2015-03-05 19:25:00
 */
  require_once("libs/ttmatlate_engine.php");

  require_once("models/tipomateriales.model.php");

  function run(){
    //htmlDatos, arreglo que contiene todas las substituciones
    // que se darán en la plantilla.

    $htmlDatos = array();
    $htmlDatos["tipomaterialTitle"] = "";
    $htmlDatos["tipomaterialMode"] = "";
    $htmlDatos["tmatid"] = "";
    $htmlDatos["tmatdsc"]="";
    $htmlDatos["tmatcant"]="";
    $htmlDatos["tmatprec"]="";
    $htmlDatos["actSelected"]="selected";
    $htmlDatos["inaSelected"]="";
    $htmlDatos["desSelected"]="";
    $htmlDatos["disabled"]="";


    if(isset($_GET["acc"])){
      switch($_GET["acc"]){
        //Manejando si es un insert
        case "ins":
          $htmlDatos["tipomaterialTitle"] = "Ingreso de Nueva tipomaterial";
          $htmlDatos["tipomaterialMode"] = "ins";
          //se determina si es una acción del formulario
          if(isset($_POST["btnacc"])){
            $lastID = insertartipomaterial($_POST);
            if($lastID){
              redirectWithMessage("¡tipomaterial Ingresada!","index.php?page=tipomaterial&acc=upd&tmatid=".$lastID);
            }else{
              //Se obtiene los datos que estaban en el post
              $htmlDatos["tmatid"] = $_POST["tmatid"];
              $htmlDatos["tmatdsc"]=$_POST["tmatdsc"];
              $htmlDatos["tmatcant"]=$_POST["tmatcant"];
              $htmlDatos["tmatprec"]=$_POST["tmatprec"];
              $htmlDatos["tmatrusring"]=$_POST["tmatrusring"];
              $htmlDatos["actSelected"]=($_POST["tmatest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($_POST["tmatest"] =="INA")?"selected":"";
              $htmlDatos["desSelected"]=($_POST["tmatest"] =="DES")?"selected":"";

            }
          }
          //si no es una acción del post se muestra los datos
          renderizar("tipomaterial", $htmlDatos);
          break;
        //Manejando si es un Update
        case "upd":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(actualizartipomaterial($_POST)){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡tipomaterial Actualizada!","index.php?page=tipomaterial&acc=upd&tmatid=".$_POST["tmatid"]);
            }
          }
          if(isset($_GET["undid"])){
            $tipomaterial = obtenertipomaterial($_GET["undid"]);
            if($tipomaterial){
              $htmlDatos["tipomaterialTitle"] = "Actualizar ".$tipomaterial["tmatdsc"];
              $htmlDatos["tipomaterialMode"] = "upd";
              $htmlDatos["tmatid"] = $tipomaterial["tmatid"];
              $htmlDatos["tmatdsc"]=$tipomaterial["tmatdsc"];
              $htmlDatos["tmatcant"]=$tipomaterial["tmatcant"];
              $htmlDatos["tmatprec"]=$tipomaterial["tmatprec"];
              $htmlDatos["tmatest"]=$tipomaterial["tmatest"];
              $htmlDatos["actSelected"]=($tipomaterial["tmatest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($tipomaterial["tmatest"] =="INA")?"selected":"";
              $htmlDatos["desSelected"]=($tipomaterial["tmatest"] =="DES")?"selected":"";

              renderizar("tipomaterial", $htmlDatos);
            }else{
              redirectWithMessage("¡tipomaterial No Encontrada!","index.php?page=tipomateriales");
            }
          }else{
            redirectWithMessage("¡tipomaterial No Encontrada!","index.php?page=tipomateriales");
          }
          break;
        //Manejando un delete
        case "dlt":
        if(isset($_POST["btnacc"])){
          //implementar logica de guardado
          if(borrartipomaterial($_POST["tmatid"])){
            //forzando a que se actualice con los datos de la db
            redirectWithMessage("¡tipomaterial Borrada!","index.php?page=tipomateriales");
          }
        }
          if(isset($_GET["tmatid"])){
            $tipomaterial = obtenertipomaterial($_GET["tmatid"]);
            if($tipomaterial){
              $htmlDatos["tipomaterialTitle"] = "¿Desea borrar ".$tipomaterial["tmatdsc"] . "?";
              $htmlDatos["tipomaterialMode"] = "dlt";
              $htmlDatos["tmatid"]=$tipomaterial["tmatid"];
              $htmlDatos["tmatdsc"]=$tipomaterial["tmatdsc"];
              $htmlDatos["tmatcant"]=$tipomaterial["tmatcant"];
              $htmlDatos["tmatprec"]=$tipomaterial["tmatprec"];
              $htmlDatos["tmatest"]=$tipomaterial["tmatest"];
              $htmlDatos["actSelected"]=($tipomaterial["tmatest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($tipomaterial["tmatest"] =="INA")?"selected":"";
              $htmlDatos["desSelected"]=($tipomaterial["tmatest"] =="DES")?"selected":"";

              $htmlDatos["disabled"]='disabled="disabled"';
              renderizar("tipomaterial", $htmlDatos);
            }else{
              redirectWithMessage("¡tipomaterial No Encontrada!","index.php?page=tipomateriales");
            }
          }else{
            redirectWithMessage("¡tipomaterial No Encontrada!","index.php?page=tipomateriales");
          }
          break;
        defualt:
          redirectWithMessage("¡Acción no permitida!","index.php?page=tipomateriales");
          break;
      }
    }


  }

  run();
?>
