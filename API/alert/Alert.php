<?php
    class Alert {
        private $conn;
        public function __construct($db) {
            $this->conn = $db;
        }
        //Get alerts
        public function getAlerts() {
            $query = 'SELECT
                            id,
                            asiakasmaara,
                            paiva
                        FROM
                            peetun_testi';
            //Prepare statement
            $stmt = $this->conn->prepare($query);
            //Execute query
            $stmt->execute();
            return $stmt;
        }
    }

?>