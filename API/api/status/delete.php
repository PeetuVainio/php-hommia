<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods');

    include_once '../../config/Database.php';
    include_once '../../alert/Alert.php';

    $database = new Database();
    $db = $database->connect();

    //Instantiate Alert object
    $alert = new Alert($db);

    $deleteData = json_decode(file_get_contents("php://input"));

    $alert->IDtt = $deleteData->IDtt;

    if($alert->update()) {
        echo json_encode(
            array('message' => 'Post Deleted')
        );
    } else {
        echo json_encode(
            array('message' => 'Post Not Deleted')
        );
    }
?>