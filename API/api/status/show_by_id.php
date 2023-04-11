<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../alert/Alert.php';

    $database = new Database();
    $db = $database->connect();

    //Instantiate Alert object
    $alert = new Alert($db);

    $alert->id = isset($_GET['id']) ? $_GET['id'] : die();

    $alert->getOneAlert();

    $alert_arr = array(
        'id' => $alert->ID,
        'Asiakasmaara' => $alert->Asiakasmaara,
        'Paiva' => $alert->Paiva
    );

    print_r(json_encode($alert_arr));

?>