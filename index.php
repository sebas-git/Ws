<?php
header("Access-Control-Allow-Origin: *");
//header('Content-Type: application/json');
require_once('utilidades.php');
    //$token="123";
    //$name="";
if(isset($_GET['url']))
{
            $var = $_GET['url'];
            if($_SERVER['REQUEST_METHOD']=='GET')
            {
                // $data = json_decode(file_get_contents($var));
                $numero = intval(preg_replace('/[^0-9]+/','',$var),10);
                //$numero=$data->name;
                //$numero = $_GET["name"];            
                //$token_recibido =$_GET["token"];
                //if($token==$token_recibido){
                    switch($var)
                    {   
                        case "conciertos";
                                $resp = Todoslosconciertos();
                                print_r(json_encode($resp) );
                                http_response_code(200);
                        break;

                        case "artistas";
                                $resp = TodoslosArtistas();
                                print_r(json_encode($resp) );
                                http_response_code(200);
                        break;

                        case "usuarios";
                                $resp = TodoslosUsuarios();
                                print_r(json_encode($resp) );
                                http_response_code(200);
                        break;

                        case "usuarios/$numero";
                                $resp = UsuarioPorID($numero);
                                print_r(json_encode($resp) );
                                http_response_code(200);
                        break;
                       
                        case "conciertos/$numero";
                                $resp = ConciertoPorID($numero);
                                print_r(json_encode($resp) );
                                http_response_code(200);
                        break;

                        case "artistas/$numero";
                                $resp = ArtistasPorID($numero);
                                print_r(json_encode($resp) );
                                http_response_code(200);
                        break;   

                        default;
                    }
               // }
            }else{
                http_response_code(405);
            }
}else{ 
    
    if($_SERVER['REQUEST_METHOD']=='POST')
    {                              
        if(isset($_POST['ClaveCompra']))
        {        
                $nombre_s=$_POST['nombre_s'];
                $modalidad_s=$_POST['modalidad_s'];
                $direccion_s=$_POST['direccion_s'];
                $codigo_s=$_POST['codigo_s'];
                $tarjeta_s=$_POST['tarjeta_s'];
                $precio_s=$_POST['precio_s'];
                $id_s=$_POST['id_s'];
                $cantidad_s=$_POST['cantidad_s'];

                Comprar($id_s,$nombre_s,$modalidad_s,$direccion_s,$tarjeta_s,$codigo_s,$precio_s,$cantidad_s);
        }
        else if(isset($_POST['ClaveRegistro']))
        {
                $nombre=$_POST['Name']; 
                $apellido=$_POST['LastName']; 
                $id_estado=$_POST['Id_State']; 
                $mail=$_POST['Mail'];
                $password=$_POST['Password'];
                $id=$_POST['Id'];
                $creation_Date="viernes";
                $remove_Date="sabado";
                $id_State=1;
                $id_User_Type=2;

                Registrar($id,$nombre,$apellido,$mail,$password,$creation_Date,$remove_Date,$id_estado,$id_User_Type);
        }
        else if(isset($_POST['ClaveLogueo']))
        {
                $mail=$_POST['Mail']; 
                $password=$_POST['Password']; 
                
                $res=Loguear($mail,$password);                
                print_r(json_encode($res));
                http_response_code(200);
        }
        else{

                $Respuesta = '{"Error":"No existe clave de metodo" ,
                               "Estado": "No vas a entrar intruso"}' ; 
                $obj = json_decode($Respuesta);
                $convert=ConvertirUTF8_fly($obj); 
                print_r(json_encode($convert));
                http_response_code(405);
        }              
    }
    else{
            http_response_code(405);
        }  
?>
<?php
}
?>


