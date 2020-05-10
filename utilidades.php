<?php
require_once("db.php");

function FotosRestaurantes($id){
  $Query ="select * from restaurante_fotos where Estado = 'Activo' and RestauranteId = $id";
  $Respuesta = ObtenerRegistros($Query);
  return ConvertirUTF8($Respuesta);
}

function TodoslosRestaurantes(){
    $Query = "select * from restaurante";
    $Respuesta = ObtenerRegistros($Query);
    //  print_r($Respuesta);
    return ConvertirUTF8($Respuesta);
}
function Todoslosconciertos(){
    $Query = "select * from conciertos";
    $Respuesta = ObtenerRegistros($Query);
    //  print_r($Respuesta);
    return ConvertirUTF8($Respuesta);
}


function ProductoPorID($id){
    $Query = "select * from restaurante where RestauranteId = $id";
    $Respuesta = ObtenerRegistros($Query);
    //  print_r($Respuesta);
    return ConvertirUTF8($Respuesta);
}

function ConciertoPorID($id){
    $Query = "select * from conciertos where id = $id";
    $Respuesta = ObtenerRegistros($Query);
    //  print_r($Respuesta);
    return ConvertirUTF8($Respuesta);
}
function ArtistasPorID($id){
    $Query = "select * from artistas where id_concierto = $id";
    $Respuesta = ObtenerRegistros($Query);
    //  print_r($Respuesta);
    return ConvertirUTF8($Respuesta);
}

function CrearRestaurante($array){

            $Nombre = $array[0]['RestauranteNombre'];
            $Logo =$array[0]['RestauranteLogo']; ;
            $Descripcion =$array[0]['RestauranteDescripcion']; ;


            $query = "insert into restaurante(RestauranteNombre,RestauranteLogo,RestauranteDescripcion)
            values('$Nombre','$Logo','$Descripcion')";
            $respuesta = NonQuery($query);

            //print_r($query);

            return true;
}

function Comprar($id,$nombre,$modalidades,$direccion,$tarjeta,$codigo,$precio,$cantidad,$conn){
    $sql_insert="INSERT INTO compras(id,nombre,modalidades,direccion,tarjeta,codigo,precio)
                VALUES (0,'$nombre','$modalidades','$direccion','$tarjeta','$codigo','$precio')";
    
    $sql_update="UPDATE conciertos set tickets = tickets-$cantidad WHERE id=$id ";

                if (mysqli_query($conn,$sql_insert)) {

                    //echo 'bien sapo loco';
                     if (mysqli_query($conn,$sql_update)) {
                        echo 'bien sapo loco';
                      }
                }
                else{
                    echo 'no funca';
                }

}

// function CrearCompra($nombre_s,$modalidad_s,$direccion_s,$codigo_s,$tarjeta_s,$precio_s){



//             $nombre_s=$nombre_s;
//             $modalidad_s=$modalidad_s;
//             $direccion_s=$direccion_s;
//             $codigo_s=$codigo_s;
//             $tarjeta_s=$tarjeta_s;
//             $precio_s=$precio_s;


//                             echo $nombre_s;
//                 echo $modalidad_s;
//                 echo $direccion_s;
//                 echo $codigo_s;
//                 echo $tarjeta_s;
//                 echo $precio_s;

//             $sql_insert="INSERT INTO compras(id,nombre,modalidades,direccion,tarjeta,codigo,anno_ex,precio)
//                 VALUES (0,'$nombre_s','$modalidad_s','$direccion_s','$tarjeta_s','$codigo_s','$precio_s')";
//             $respuesta = NonQuery($sql_insert);
            
//             if (mysqli_query($conexion,$sql_insert)) {

//                     //echo 'bien sapo loco';
//                     // if (mysqli_query($conn,$sql_update)) {
//                         echo 'bien sapo loco';
//                     // }
//                 }
//                 else{
//                     echo 'no funca';
//                 }
//             //print_r($query);

//             return true;




// }



?>
