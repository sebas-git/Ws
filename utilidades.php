<?php
require_once("db.php");

// function FotosRestaurantes($id){
//   $Query ="select * from restaurante_fotos where Estado = 'Activo' and RestauranteId = $id";
//   $Respuesta = ObtenerRegistros($Query);
//   return ConvertirUTF8($Respuesta);
// }

// function TodoslosRestaurantes(){
//     $Query = "select * from restaurante";
//     $Respuesta = ObtenerRegistros($Query);
//     //  print_r($Respuesta);
//     return ConvertirUTF8($Respuesta);
// }

// function ProductoPorID($id){
//     $Query = "select * from restaurante where RestauranteId = $id";
//     $Respuesta = ObtenerRegistros($Query);
//     //  print_r($Respuesta);
//     return ConvertirUTF8($Respuesta);
// }

// function CrearRestaurante($array){

//             $Nombre = $array[0]['RestauranteNombre'];
//             $Logo =$array[0]['RestauranteLogo']; ;
//             $Descripcion =$array[0]['RestauranteDescripcion']; ;


//             $query = "insert into restaurante(RestauranteNombre,RestauranteLogo,RestauranteDescripcion)
//             values('$Nombre','$Logo','$Descripcion')";
//             $respuesta = NonQuery($query);

//             //print_r($query);

//             return true;
// }

function Todoslosconciertos(){
    $Query = "select * from conciertos";
    $Respuesta = ObtenerRegistros($Query);
    //  print_r($Respuesta);
    return ConvertirUTF8($Respuesta);
}

function TodoslosArtistas(){
    $Query = "select * from artistas";
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

function Comprar($id,$nombre,$modalidades,$direccion,$tarjeta,$codigo,$precio,$cantidad){
    $query="insert into compras(id,nombre,modalidades,direccion,tarjeta,codigo,precio)
    values (0,'$nombre','$modalidades','$direccion','$tarjeta','$codigo','$precio')";
    $respuesta = NonQuery($query);

    $sql_update="update conciertos set tickets = tickets-$cantidad WHERE id=$id ";
    $respuesta1 = NonQuery($sql_update);
    return true;         
}

function TodoslosUsuarios(){
    $Query = "select * from fly_users";
    $Respuesta = ObtenerRegistros_fly($Query);
    //  print_r($Respuesta);
    return ConvertirUTF8_fly($Respuesta);
}

function UsuarioPorID($id){
    $Query = "select * from fly_users where Id = $id";
    $Respuesta = ObtenerRegistros_fly($Query);
    //  print_r($Respuesta);
    return ConvertirUTF8_fly($Respuesta);
}

function Registrar($id,$nombre,$apellido,$mail,$password,$creation_Date,$remove_Date,$id_estado,$id_User_Type){
    echo $id_User_Type;
    $query="insert into fly_users(Id,Name,LastName,Mail,Password,Creation_Date,Remove_Date,Id_State,Id_User_Type)
    values (0,'$nombre','$apellido','$mail','$password','$creation_Date','$remove_Date','$id_estado','$id_User_Type')";
    $respuesta = NonQuery_fly($query);
    return true;         
}

function Loguear($mail,$password){
    $Query = "select * from fly_users where Password='$password' and Mail='$mail' ";
    
    $verif=Validar($Query,$mail,$password);
    if($verif=="si"){
        $Respuesta = ObtenerRegistros_fly($Query);
        return ConvertirUTF8_fly($Respuesta);
    }else{
        $Respuesta = '{"Error":"Usuario incorrecto" ,
                       "Estado": "No vas a entrar"}' ;  
        $obj = json_decode($Respuesta);
        return ConvertirUTF8_fly($obj);
    }
    
}

?>
