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
                    $numero = intval(preg_replace('/[^0-9]+/','',$var),10);

                    if(isset($_GET['TokenConcierto'])){

                            $ClaveConcierto=$_GET['TokenConcierto'];
                            $token= $var.$ClaveConcierto;
                            $token1=true;
                            $token2=false;
                            $token3=false;
                            $token4=false;
                            $ClaveUsuarioId="";
                            $ClaveUsuarios="";
                            $ClaveConciertoId="";           
                    }   
                    else if(isset($_GET['TokenConciertoId'])){
                            
                            $ClaveConciertoId=$_GET['TokenConciertoId'];
                            $token= $var.$ClaveConciertoId;
                            $token2=true;
                            $token1=false;
                            $token3=false;
                            $token4=false;
                            $ClaveUsuarioId="";
                            $ClaveConcierto="";
                            $ClaveUsuarios="";                                               
                    }
                    else if(isset($_GET['TokenUsuario'])){

                            $ClaveUsuarios=$_GET['TokenUsuario'];
                            $token= $var.$ClaveUsuarios;
                            $token3=true;
                            $token1=false;
                            $token2=false;
                            $token4=false;
                            $ClaveConcierto="";
                            $ClaveUsuarioId="";
                            $ClaveConciertoId="";                                                          
                    }
                    else if(isset($_GET['TokenUsuarioId'])){
                            
                            $ClaveUsuarioId=$_GET['TokenUsuarioId'];
                            $token= $var.$ClaveUsuarioId;
                            $token4=true;
                            $token1=false;
                            $token2=false;
                            $token3=false;
                            $ClaveUsuarios="";
                            $ClaveConcierto="";
                            $ClaveConciertoId="";                                                   
                    }
                    else{
                            $token=false;
                            $token1=false;
                            $token2=false;
                            $token3=false;
                            $token4=false;
                    }
                
                    if($token1==true || $token2==true || $token3==true || $token4==true){ 
                            
                        switch($token)
                        {   
                            
                            case "conciertos".$ClaveConcierto;
                                    $resp = Todoslosconciertos();
                                    print_r(json_encode($resp) );
                                    http_response_code(200);
                            break;

                            case "artistas";
                                    $resp = TodoslosArtistas();
                                    print_r(json_encode($resp) );
                                    http_response_code(200);
                            break;

                            case "usuarios".$ClaveUsuarios;
                                    $resp = TodoslosUsuarios();
                                    print_r(json_encode($resp) );
                                    http_response_code(200);
                            break;

                            case "usuarios/$numero".$ClaveUsuarioId;
                                    $resp = UsuarioPorID($numero);
                                    print_r(json_encode($resp) );
                                    http_response_code(200);
                            break;
                        
                            case "conciertos/$numero".$ClaveConciertoId;
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
                    }
            }
            else
            {
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
<html>
<head>
<style>
.img-responsive {
    max-width: 100%;
    height: auto;
}
</style>

        <title>WEB SERVICE (WS)</title>
        <link rel="shortcut icon" href="logo.ico">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
       

</head>
<body>
    <br>
    <!-- <center><h1><code  style="color: orange;">Bienvenido a mi WS</code></h1></center> -->
    <br>
    

    <div class="container">
        <div class="row">
                <div style="border-style: none; margin:auto; margin-top:70px" class="col col-md-6 col-sm-auto ">
                        <img class="img-responsive"   src="LogoPng.png">
                </div>
        
                <div style="border-style: none; margin:auto; margin-top:120px " class="col col-sm-auto col-md-auto">
                
                        <h2 ><code style="color: blue; margin-top: 20px">Method GET</code></h2>
                        <h3><code  style="color: black; font-size:15px">Method GET: http://localhost:80/Api/artistas/(id)</code></h3>
                        <h3><code style="color: black;font-size:15px">Method GET: http://localhost:80/Api/conciertos</code></h3>
                        <h3><code style="color: black;font-size:15px">Method GET: http://localhost:80/Api/conciertos/(id)</code></h3>
                        <h2><code  style="color:green;">Method POST</code></h2>
                        <h3><code style="color: black;font-size:15px">Method POST: Insert</code></h3>
                        <h3><code style="color: black;font-size:15px">Method POST: Update</code></h3><br/>
                        <button class="btn btn-success">Consume !!</button>
                
                </div>
                
        </div>
    </div>

    
</body>
</html>
<?php
}
?>