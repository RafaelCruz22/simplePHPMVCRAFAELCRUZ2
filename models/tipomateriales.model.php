<?php
    require_once("libs/dao.php");

    function obtenertipomateriales(){
        $tipomateriales = array();
        $sqlstr = "select * from tipomateriales;";
        $tipomateriales = obtenerRegistros($sqlstr);
        return $tipomateriales;
    }

    function obtenertipomaterial($tipomaterialID){
      $tipomaterial = array();
      $sqlstr = "select * from tipomateriales where tmatid = %d;";
      $sqlstr = sprintf($sqlstr, $tipomaterialID);
      $tipomaterial = obtenerUnRegistro($sqlstr);
      return $tipomaterial;
    }

    function insertartipomaterial($tipomaterial){
      if($tipomaterial && is_array($tipomaterial)){
         $sqlInsert = "INSERT INTO `tipomateriales` (`tmatdsc`, `tmatcant`, `tmatprec` , `tmatest`)VALUES('%s','%d','%f','%s');";
         $sqlInsert = sprintf($sqlInsert,
                        valstr($tipomaterial["tmatdsc"]),
                        valstr($tipomaterial["tmatcant"]),
                        valstr($tipomaterial["tmatprec"]),
                        valstr($tipomaterial["tmatest"])
                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }

    function actualizartipomaterial($tipomaterial){
      if($tipomaterial && is_array($tipomaterial)){
        $sqlUpdate = "update tipomateriales set tmatdsc='%s', tmatcant='%d', tmatprec='%f' , tmatest='%s' where tmatid=%d;";
        $sqlUpdate = sprintf($sqlUpdate,
                      valstr($tipomaterial["tmatdsc"]),
                      valstr($tipomaterial["tmatcant"]),
                      valstr($tipomaterial["tmatprec"]),
                      valstr($tipomaterial["tmatest"])
                    );
        return ejecutarNonQuery($sqlUpdate);
      }
      return false;
    }

    function borrartipomaterial($tipomaterialID){
      if($tipomaterialID){
        $sqlDelete = "delete from tipomateriales where tmatid=%d;";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($tipomaterialID)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }
?>
