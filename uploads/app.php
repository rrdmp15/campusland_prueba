<?php
    require_once('../vendor/autoload.php');

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $router = new \Bramus\Router\Router();

    //Get all
    $router->get('/campers', function(){
        \App\campers::getInstance()->getAllcampers();
    });

    //Get by id
    $router->post('/campers/{id}', function($id){
        \App\campers::getInstance()->getcampers($id);
    });

    //Create
    $router -> post('/campers', function () {
        \App\campers::getInstance(json_decode(file_get_contents("php://input"), true))->postCampers();
    });

    //Update
    $router -> put('/campers/{idCamper}', function($idCamper){
        $data = json_decode(file_get_contents("php://input"), true);
        \App\campers::getInstance()->updatecampers(
            $data['nombreCamper'],
            $data['apellidoCamper'],
            $data['fechaNac'],
            $data['idReg'],
            $idCamper
        );
    });

    //Delete
    $router -> delete('/campers/{idCamper}', function($idCamper){
        \App\campers::getInstance()->deleteCampers($idCamper);
    });

    $router->run();
?>