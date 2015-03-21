<?php
require_once("libs/dao.php");
function obtenerEmpresas(){
$Empresas = array();
$sqlstr = "select * from empresa;";
$Empresas = obtenerRegistros($sqlstr);
return $Empresas;
}
function obtenerEmpresa($EmpresaID){
$Empresa = array();
$sqlstr = "select * from empresa where empresaId = %d;";
$sqlstr = sprintf($sqlstr, $EmpresaID);
$Empresa = obtenerUnRegistro($sqlstr);
return $Empresa;
}
function insertarEmpresa($Empresa){
if($Empresa && is_array($Empresa)){
if(!isset($Empresa["empusring"]))$Empresa["empusring"]="Sistemas";
$sqlInsert = "INSERT INTO `empresa` (`empdsc`, `emprtn`, `empdir`, `emptel`, `emptel2`, `empurl`, `empfching`, `empusring`, `empest`, `empctc`, `emptip`) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', now(), '%s', '%s', '%s', '%s');";
$sqlInsert = sprintf($sqlInsert,
      $Empresa["empdsc"],
      $Empresa["emprtn"],
      $Empresa["empdir"],
      $Empresa["emptel"],
      $Empresa["emptel2"],
      $Empresa["empurl"],
      $Empresa["empusring"],
      $Empresa["empest"],
      $Empresa["empctc"],
      $Empresa["emptip"]
);
if(ejecutarNonQuery($sqlInsert)){
return getLastInserId();
}
}
return false;
}
function actualizarEmpresa($Empresa){
if($Empresa && is_array($Empresa)){
$sqlUpdate = "update empresa set empdsc='%s', emprtn='%s', empdir='%s', emptel='%s', emptel2='%s' , empurl='%s', empest='%s', empctc='%s', emptip='%s' where empresaId=%d;";
$sqlUpdate = sprintf($sqlUpdate,
            valstr($Empresa["empdsc"]),
            valstr($Empresa["emprtn"]),
            valstr($Empresa["empdir"]),
            valstr($Empresa["emptel"]),
            valstr($Empresa["emptel2"]),
            valstr($Empresa["empurl"]),
            valstr($Empresa["empest"]),
            valstr($Empresa["empctc"]),
            valstr($Empresa["emptip"]),
            valstr($Empresa["empresaId"])
);
return ejecutarNonQuery($sqlUpdate);
}
return false;
}
function borrarEmpresa($EmpresaID){
if($EmpresaID){
$sqlDelete = "delete from Empresa where empresaid=%d;";
$sqlDelete = sprintf($sqlDelete,
valstr($EmpresaID)
);
return ejecutarNonQuery($sqlDelete);
}
return false;
}
?>
