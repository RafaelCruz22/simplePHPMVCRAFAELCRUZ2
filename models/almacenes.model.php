<?php

    require_once("libs/dao.php");

    function obteneralmacenes(){
        $almacenes = array();
        $sqlstr = "select * from almacenes;";
        $almacenes = obtenerRegistros($sqlstr);
        return $almacenes;
    }


    function obteneralmacen($almacenID){
      $almacen = array();
      $sqlstr = "select * from almacenes where almid = %d;";
      $sqlstr = sprintf($sqlstr, $almacenID);
      $almacen = obtenerUnRegistro($sqlstr);
      return $almacen;
    }

    function insertaralmacen($almacen){
      if($almacen && is_array($almacen)){
         $sqlInsert = "INSERT INTO `almacenes` (`almrzs`, `almnombre`, `almtmat`, `almsubalm`, `almtel`, `almtel2`, `almidsalm` , `empid`)VALUES('%s','%s','%s','%s','%d','%d','%d','%d');";
         $sqlInsert = sprintf($sqlInsert,
                        valstr($almacen["almrzs"]),
                        valstr($almacen["almnombre"]),
                        valstr($almacen["almtmat"]),
                        valstr($almacen["almsubalm"]),
                        valstr($almacen["almtel"]),
                        valstr($almacen["almtel2"]),
                        valstr($almacen["almidsalm"]),
                        valstr($almacen["empid"])
                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }

    function actualizaralmacen($almacen){
      if($almacen && is_array($almacen)){
        $sqlUpdate = "update almacenes set almrzs='%s', almnombre=%s, almtmat=%s, almsubalm='%s', almtel='%d', almtel2='%d', almidsalm='%d', empid='%d' where almid=%d;";
        $sqlUpdate = sprintf($sqlUpdate,
                    valstr($almacen["almrzs"]),
                    valstr($almacen["almnombre"]),
                    valstr($almacen["almtmat"]),
                    valstr($almacen["almsubalm"]),
                    valstr($almacen["almtel"]),
                    valstr($almacen["almtel2"]),
                    valstr($almacen["almidsalm"]),
                    valstr($almacen["empid"])
                    );
        return ejecutarNonQuery($sqlUpdate);
      }
      return false;
    }

    function borraralmacen($almacenID){
      if($almacenID){
        $sqlDelete = "delete from almacenes where almid=%d;";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($almacenID)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }
?>
