<?php 


/* El Scrip para genera la base de datos se encuentas en la carpeta base_de_datos la cual se encuentras adjuntada en este proyecto */ 

//Parrametros Base Prueba 
$server = "127.0.0.1";
$user = "root";
$pswd = "";
$database = "restaurantes" ; 
$port = "3306";
//Parrametros Base App 
$server_fly = "127.0.0.1";
$user_fly = "root";
$pswd_fly = "";
$database_fly = "fly_db_mod" ; 
$port_fly = "3306";


//String de conexion Prueba 

$conexion =  new mysqli($server,$user,$pswd,$database,$port);
if( $conexion -> connect_errno){
    die($conexion -> connect_error);
}

//String de conexion App

$conexion_fly =  new mysqli($server_fly,$user_fly,$pswd_fly,$database_fly,$port_fly);
if( $conexion_fly -> connect_errno){
    die($conexion_fly -> connect_error);
}

//guardar , modificar , eliminar (Prueba)
 function NonQuery($sqlstr , &$conexion = null){
    if(!$conexion)global $conexion;
    $result = $conexion->query($sqlstr);
    return $conexion -> affected_rows;

 }

 //guardar , modificar , eliminar (App)
 function NonQuery_fly($sqlstr_fly , &$conexion_fly = null){
    if(!$conexion_fly)global $conexion_fly;
    $result = $conexion_fly->query($sqlstr_fly);
    return $conexion_fly -> affected_rows;

 }

//select (Prueba)
function ObtenerRegistros($sqlstr , &$conexion = null){
    if(!$conexion)global $conexion;
    $result = $conexion->query($sqlstr);
    $resultArray  = array();
    foreach( $result  as $registros ){
        $resultArray[] = $registros;
    }
    return $resultArray;
 }

 //select (App)
function ObtenerRegistros_fly($sqlstr_fly , &$conexion_fly = null){

    if(!$conexion_fly)global $conexion_fly;
    $result = $conexion_fly->query($sqlstr_fly);
    $resultArray  = array();
    foreach( $result  as $registros ){
        $resultArray[] = $registros;
    }
    return $resultArray;
 }

 function Validar($sqlstr_fly,$mail,$password,&$conexion_fly = null){
    
    if(!$conexion_fly)global $conexion_fly;
    $result = $conexion_fly->query($sqlstr_fly);  
        while($row = $result->fetch_array()) {
            $userok = $row["Mail"];
            $passok = $row["Password"];
        }
    if(isset($userok)){
        if($mail==$userok && $password==$passok){
            
            echo "ok"; 
            
        }
    }
    else{
        echo "porsapo";
         
    }
    

 }

//utf-8 (Prueba)
function ConvertirUTF8($array){

        array_walk_recursive($array,function(&$item,$key){
            if(!mb_detect_encoding($item,'utf-8', true)){
                $item = utf8_encode( $item);
            }
        });
        return  $array;
}

//utf-8 (App)
function ConvertirUTF8_fly($array){

    array_walk_recursive($array,function(&$item,$key){
        if(!mb_detect_encoding($item,'utf-8', true)){
            $item = utf8_encode( $item);
        }
    });
    return  $array;
}

?>