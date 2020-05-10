<?php
header('Access-Control-Allow-Origin: *');
require_once('utilidades.php');
    $url="localhost";
    $database="restaurantes";
    $username="root";
    $password="";
    $conn=mysqli_connect($url,$username,$password,$database);
if(isset($_GET['url'])){

            $var = $_GET['url'];
            if($_SERVER['REQUEST_METHOD']=='GET'){
                $numero = intval(preg_replace('/[^0-9]+/','',$var),10);
                switch($var){
                    
                    case "conciertos";
                            $resp = Todoslosconciertos();
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

            }else{
                http_response_code(405);
            }

}else{ 
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
                 
                
        if(isset($_POST['ClaveCompra'])){
            
                $nombre_s=$_POST['nombre_s'];
                $modalidad_s=$_POST['modalidad_s'];
                $direccion_s=$_POST['direccion_s'];
                $codigo_s=$_POST['codigo_s'];
                $tarjeta_s=$_POST['tarjeta_s'];
                $precio_s=$_POST['precio_s'];
                $id_s=$_POST['id_s'];
                $cantidad_s=$_POST['cantidad_s'];

                Comprar($id_s,$nombre_s,$modalidad_s,$direccion_s,$tarjeta_s,$codigo_s,$precio_s,$cantidad_s,$conn);
        }
                
        }else{
            http_response_code(405);
        }
    


mysqli_close($conn);
?>

<html>
<head>
    <title>WEB SERVICE (WS)</title>
</head>
<body>
    <br>
    <center><h1><code>Bienvenido a mi WS</code></h1></center>
    <br>
    <center><div>
        <h2 style="color: blue;"><code>Method GET</code></h2>
        <h3><code>Method GET: http://localhost:8080/Api/artistas/(id)</code></h3>
        <h3><code>Method GET: http://localhost:8080/Api/conciertos</code></h3>
        <h3><code>Method GET: http://localhost:8080/Api/conciertos/(id)</code></h3>
        <h2 style="color:green;"><code>Method POST</code></h2>
        <h3><code>Method POST: Insert</code></h3>
        <h3><code>Method POST: Update</code></h3>
    </div></center>
</body>
</html>
<?php
}
?>