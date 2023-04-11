<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../alert/Alert.php';

    $database = new Database();
    $db = $database->connect();

    //Instantiate Alert object
    $alert = new Alert($db);

    //Alert query
    $result = $alert->getAlerts();

    //Get row count
    $num = $result->rowCount();

    //Katsoo onko Alertteja
    if($num > 0) {
        //Alert array
        $alerts_arr = array();
        $alerts_arr['AlertData'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $alert_item = array(
                'id' => $id,
                'asiakasmaara' => $asiakasmaara,
                'paiva' => $paiva
            );
            
            //työntää "AlertData"
            array_push($alerts_arr['AlertData'], $alert_item);
        }

        //Array elements to JSON & output
        echo json_encode($alerts_arr);

    } else {
        //Ei löytynyt Alertteja
        echo json_encode(
            array('message' => 'Ei halytyksia')
        );
    }

?>