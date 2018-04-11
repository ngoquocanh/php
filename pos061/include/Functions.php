<?php
    class Functions {
        private $conn;

        /**
         * constructor
         */
        function __construct() {
            require_once 'ConnectDb.php';
            $db = new ConnectDb();
            $this->conn = $db->connect();
        }

        /**
         * destructor
         */
        function __destruct() {

        }

        /**
         * get object by id
         * @return object
         */
        public function getObject($id) {
            $stmt = $this->conn->prepare("SELECT * FROM pos061 WHERE id = ?");
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                $object = $stmt->get_result()->fetch_assoc();
                $stmt->close();
                return $object;
            } else {
                return NULL;
            }
        }

        /**
         * create new object
         * @return object
         */
        public function storeObject($countryCode, $areaCode, $mobileNumber) {
            $stmt = $this->conn->prepare("INSERT INTO pos061(country_code, area_code, mobile_number) VALUES(?, ?, ?)");
            $stmt->bind_param("sss", $countryCode, $areaCode, $mobileNumber);
            $result = $stmt->execute();
            $stmt->close();

            // check for successful store
            if ($result) {
                $stmt = $this->conn->prepare("SELECT * FROM pos061 WHERE mobile_number = ?");
                $stmt->bind_param("s", $mobileNumber);
                $stmt->execute();
                $object = $stmt->get_result()->fetch_assoc();
                $stmt->close();
                return $object;
            } else {
                return false;
            }
        }

        /**
         * Check object is existed or not
         */
        public function isObjectExisted($mobileNumber) {
            $stmt = $this->conn->prepare("SELECT mobile_number from pos061 WHERE mobile_number = ?");
            $stmt->bind_param("s", $mobileNumber);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $stmt->close();
                return true;
            } else {
                $stmt->close();
                return false;
            }
        }

    }
?>