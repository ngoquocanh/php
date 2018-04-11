<?php
    class ConnectDb {
        private $conn;

        /**
         * Connect to database
         */
        public function connect() {
            require_once 'include/Config.php';
            $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
            return $this->conn;
        }
    }
?>