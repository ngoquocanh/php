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
         * get user by id
         * @return user
         */
        public function getUsers($id) {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                $user = $stmt->get_result()->fetch_assoc();
                $stmt->close();
                return $user;
            } else {
                return NULL;
            }
        }

        /**
         * save new user
         * @return user
         */
        public function storeUser($name, $email, $phone) {
            $stmt = $this->conn->prepare("INSERT INTO users(name, email, phone) VALUES(?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $phone);
            $result = $stmt->execute();
            $stmt->close();

            // check for successful store
            if ($result) {
                $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $user = $stmt->get_result()->fetch_assoc();
                $stmt->close();
                return $user;
            } else {
                return false;
            }
        }

        /**
         * Check user is existed or not
         */
        public function isUserExisted($email) {
            $stmt = $this->conn->prepare("SELECT email from users WHERE email = ?");
            $stmt->bind_param("s", $email);
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