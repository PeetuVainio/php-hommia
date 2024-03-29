<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods');

    include_once '../../config/Database.php';
    include_once '../../alert/Alert.php';

    $database = new Database();
    $db = $database->connect();

    //Instantiate Alert object
    $alert = new Alert($db);

    $updateData = json_decode(file_get_contents("php://input"));

    $alert->AsiakasMaarat = $updateData->AsiakasMaarat;
    $alert->Paivatt = $updateData->Paivatt;
    $alert->IDt = $updateData->IDt;

    if($alert->update()) {
        echo json_encode(
            array('message' => 'Post Updated')
        );
    } else {
        echo json_encode(
            array('message' => 'Post Not Updated')
        );
    }
?>