<?php
    require_once("libs/dao.php");
    function obtenertipoalmacene(){
        $tipoalmacenes = array();
        $sqlstr = "select * from tipoalmacenes;";
        $tipoalmacenes = obtenerRegistros($sqlstr);
        return $tipoalmacenes;
    }

    function obtenertipoalmacen($tipoalmacenID){
      $tipoalmacen = array();
      $sqlstr = "select * from tipoalmacenes where talid = %d;";
      $sqlstr = sprintf($sqlstr, $tipoalmacenID);
      $tipoalmacen = obtenerUnRegistro($sqlstr);
      return $tipoalmacen;
    }

    function insertartipoalmacen($tipoalmacen){
      if($tipoalmacen && is_array($tipoalmacen)){
         $sqlInsert = "INSERT INTO `tipoalmacenes` (`taldsc`, `taldir`, `taltel`, `talest`)VALUES('%s','%s','%d','%s');";
         $sqlInsert = sprintf($sqlInsert,
                        valstr($tipoalmacen["taldsc"]),
                        valstr($tipoalmacen["talrtn"]),
                        valstr($tipoalmacen["taldir"]),
                        valstr($tipoalmacen["taltel"]),
                        valstr($tipoalmacen["talest"])
                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }

    function actualizartipoalmacen($tipoalmacen){
      if($tipoalmacen && is_array($tipoalmacen)){
        $sqlUpdate = "update tipoalmacenes set taldsc='%s', taldir=%s, taltel='%d', talest='%s' where talid=%d;";
        $sqlUpdate = sprintf($sqlUpdate,
                      valstr($tipoalmacen["taldsc"]),
                      valstr($tipoalmacen["talrtn"]),
                      valstr($tipoalmacen["taldir"]),
                      valstr($tipoalmacen["taltel"]),
                      valstr($tipoalmacen["talest"])
                    );
        return ejecutarNonQuery($sqlUpdate);
      }
      return false;
    }

    function borrartipoalmacen($tipoalmacenID){
      if($tipoalmacenID){
        $sqlDelete = "delete from tipoalmacenes where talid=%d;";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($tipoalmacenID)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }
?>
