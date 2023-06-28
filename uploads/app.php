<?php
    require "../vendor/autoload.php"; //se trae el autoload desde el vendor creado por composer
    $router = new \Bramus\Router\Router();
    $dotenv = Dotenv\Dotenv::createImmutable("../")->load();
    /**
     * ! CRUD DE LA TABLA "pais":
     */
    $router->get("/pais", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM pais");
        $res -> execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
         // retorna la consulta como un array asociativo 
        echo json_encode($res);
    });

    $router->put("/pais", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE pais SET nombrePais = :NOMBRE_PAIS WHERE idPais =:ID");
        $res-> bindValue("NOMBRE_PAIS", $_DATA['nombrePais']); //para editar se debe escribir la sentencia dentro del $_DATA["nom"] es decir { nom: Wilfer, id: 1}
        $res-> bindValue("ID", $_DATA['idPais']);
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router -> delete("/pais", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM pais WHERE idPais =:ID");
        $res->bindValue("ID", $_DATA["idPais"]);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/pais", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO pais (nombrePais) VALUES (:NOMBRE_PAIS)");
        $res-> bindValue("NOMBRE_PAIS", $_DATA['nombrePais']); 
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->run();
    /*
        Preparar -> 
            - Se llama a la conexion    
        Enviar  ->
        Ejecutar ->
        Esperar ->
    */
?>