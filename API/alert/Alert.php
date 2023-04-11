<?php
    class Alert {
        private $conn;
        public function __construct($db) {
            $this->conn = $db;
        }
        //Hakee kaikki Alertit
        public function getAlerts() {
        //tekee queryn
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

        //Hakee vain yhden Alertin
        public function getOneAlert() {
            //tekee queryn
            $query = 'SELECT
                            id AS ID,
                            asiakasmaara AS Asiakasmaara,
                            paiva AS Paiva
                        FROM
                            peetun_testi
                        WHERE
                            peetun_testi.id = ?
                        ';

            //Prepare statement
            $stmt = $this->conn->prepare($query);

            //Bind id
            $stmt->bindParam(1, $this->id);

            //Execute query
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->ID = $row['ID'];
            $this->Asiakasmaara = $row['Asiakasmaara'];
            $this->Paiva = $row['Paiva'];
        }
    }

?>