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
        $res-> bindValue("NOMBRE_PAIS", $_DATA['nombrePais']);
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

    /**
     * ! CRUD DE LA TABLA "departamento":
     */

    $router->get("/dep", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM departamento");
        $res -> execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
         // retorna la consulta como un array asociativo 
        echo json_encode($res);
    });

    $router->put("/dep", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE departamento SET nombreDep = :NOMBRE_DEP, idPais = :IDPAIS WHERE idDep =:ID");
        $res-> bindValue("NOMBRE_DEP", $_DATA['nombreDep']);
        $res-> bindValue("IDPAIS", $_DATA['idPais']);
        $res-> bindValue("ID", $_DATA['idDep']);
        $res -> execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router -> delete("/dep", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM departamento WHERE idDep =:ID");
        $res->bindValue("ID", $_DATA["idDep"]);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/dep", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO departamento (nombreDep, idPais) VALUES (:NOMBRE_DEP, :IDPAIS)");
        $res-> bindValue("NOMBRE_DEP", $_DATA['nombreDep']); 
        $res-> bindValue("IDPAIS", $_DATA['idPais']);
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