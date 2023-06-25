<?php
require '../../vendor/autoload.php';

Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=api','root','root'));

Flight::route('/', function(){
    echo 'hello world!';
});

// Consulta todos los productos de la DB
Flight::route('GET /all', function(){
    echo 'Listando productos';
    $query = Flight::db()->prepare("SELECT * FROM productos");
    $query->execute();
    $datos=$query->fetchAll();
    Flight::json($datos);
});
// Consulta todos los productos de la DB
Flight::route('GET /producto/@id', function($id){
    echo 'Listando productos';
    $query = Flight::db()->prepare("SELECT * FROM productos WHERE id={$id}");
    $query->execute();
    $datos=$query->fetchAll();
    Flight::json($datos);
});

// Creamos un nuevo producto
Flight::route('POST /producto', function(){
    
    $datos=Flight::request()->data;
    // $sql = "INSERT INTO productos  (nombre, precio, descripcion, media) VALUES (?,?,?,?)";
    $sql = "INSERT INTO productos  (nombre, precio, descripcion, media) VALUES ('$datos->nombre','$datos->precio','$datos->descripcion','$datos->media')";
    echo $sql;
    $query = Flight::db()->prepare($sql);
    // $query->bindParam(1,$datos->nombre);
    // $query->bindParam(2,$datos->precio);
    // $query->bind$$
    $query->execute();
    

    Flight::jsonp($datos);

});

Flight::route('DELETE /producto/@id', function($id){
    
    
    //$datos=Flight::request()->data;
    $sql = "DELETE FROM productos  WHERE id = {$id}";
    //$sql = "INSERT INTO productos  (nombre, precio, descripcion, media) VALUES ('$datos->nombre','$datos->precio','$datos->descripcion','$datos->media')";
    //echo $sql;
    $query = Flight::db()->prepare($sql);
    // $query->bindParam(1,$datos->nombre);
    // $query->bindParam(2,$datos->precio);
    // $query->bind$$
    $query->execute();
    

    Flight::jsonp($id);

});

/*Por alguna razon esta ruta funciona con POST pero no con PUT
$datos no obtiene valores del Fligth::request con PUT
----
Actualizacion, con el metodo PUT solo funciona con un Json y con co n datos de form. 
*/
Flight::route('PUT|POST /producto/@id', function($id){
    $datos=Flight::request()->data;
    $uno=$datos->nombre;
    $dos=$datos->precio;
    

    $sql = "UPDATE productos SET nombre= '{$uno}' , precio= '{$dos}' WHERE id= {$id}";
    $query=Flight::db()->prepare($sql);
    // //$query->bindParam(1,$uno);
    // //$query->bindParam(2,$dos);
    $query->execute();
    Flight::jsonp($datos);
});

Flight::start();