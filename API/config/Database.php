<?php
    class Database {
        private $host = 'mirankanta.mysql.database.azure.com';
        private $db_name = 'peetundb';
        private $username = 'Mira';
        private $password = 'Aarinen1977';
        private $conn;

        public function connect() {
            $this->conn = null;

            try {
                //Selitä PDO https://www.ohjelmointiputka.net/koodivinkit/25206-php-sql-pdo-hyv%c3A4-tapa-k%c3%A4sitell%c3%A4-tietokantoja

                //Luodaan PDO-olio, joka pitää sisällään tietokantayhteyden
                //Tietokantaa käytetään luodun PDO-olion kautta
                $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);

                //Oletusarvoisesti
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(Exception $e) {
                echo 'Connection Error: ' . $e->getMessage();
            }

            return $this->conn;
        }
    }