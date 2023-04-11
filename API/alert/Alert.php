<?php
    class Alert {
        public $ID;
        public $id;
        public $Asiakasmaara;
        public $Paiva;
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

        public function create() {
            
            $query = 'INSERT INTO peetun_testi
            SET asiakasmaara = :AsiakasMaara,
            paiva = :Paivat';

        $stmt = $this->conn->prepare($query);

        $this->AsiakasMaara = htmlspecialchars(strip_tags($this->AsiakasMaara));
        $this->Paivat = htmlspecialchars(strip_tags($this->Paivat));

        $stmt->bindParam(':AsiakasMaara', $this->AsiakasMaara);
        $stmt->bindParam(':Paivat', $this->Paivat);

        if($stmt->execute()) {
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        
        return false;
        }
    }

?>