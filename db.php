<?php 
/* Creado por Jose Wifredo Aleman Como Prueba */
/* Donostia San sebastian España 02-10-2018 */

/* El Scrip para genera la base de datos se encuentas en la carpeta base_de_datos la cual se encuentras adjuntada en este proyecto */ 

$server = "127.0.0.1";
$user = "root";
$pswd = "";
$database = "restaurantes" ; 
$port = "3306";


$conn=mysqli_connect($server,$user,$pswd,$database);
//String de conexion 

$conexion =  new mysqli($server,$user,$pswd,$database,$port);
if( $conexion -> connect_errno){
    die($conexion -> connect_error);
}

//guardar , modificar , eliminar 
 function NonQuery($sqlstr , &$conexion = null){
    if(!$conexion)global $conexion;
    $result = $conexion->query($sqlstr);
    return $conexion -> affected_rows;

 }
//select
function ObtenerRegistros($sqlstr , &$conexion = null){
    if(!$conexion)global $conexion;
    $result = $conexion->query($sqlstr);
    $resultArray  = array();
    foreach( $result  as $registros ){
        $resultArray[] = $registros;
    }
    return $resultArray;
 }
//utf-8
function ConvertirUTF8($array){

        array_walk_recursive($array,function(&$item,$key){
            if(!mb_detect_encoding($item,'utf-8', true)){
                $item = utf8_encode( $item);
            }
        });
        return  $array;
}
?>