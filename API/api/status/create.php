<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods');

    include_once '../../config/Database.php';
    include_once '../../alert/Alert.php';

    $database = new Database();
    $db = $database->connect();

    //Instantiate Alert object
    $alert = new Alert($db);

    $insertData = json_decode(file_get_contents("php://input"));

    $alert->AsiakasMaara = $insertData->AsiakasMaara;
    $alert->Paivat = $insertData->Paivat;

    if($alert->create()) {
        echo json_encode(
            array('message' => 'Alert done')
        );
    } else {
        echo json_encode(
            array('message' => 'Alert not done')
        );
    }

?>