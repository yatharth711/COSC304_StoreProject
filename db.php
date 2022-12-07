<?php 
    class db{

        private $servername = "192.168.1.142";
        private $username = "root";
        private $password = "";
        private $dbName = "gamenation";
        private $conn;
        private $stmt;

        function connect(){
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbName);
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }

        function closeCONN(){
            $this->conn->close();
        }

        function closeSTMT(){
            $this->stmt->close();
        }

        function db_signUP($fn, $ln, $email, $password, $address, $city, $province, $country, $pc){
            $this->connect();
            $stmt = $this->conn->prepare("INSERT INTO login(fname, lname, email, password, address,city, province, country, postalcode) VALUES (?,?,?,?,?,?,?,?,?);");
            $stmt->bind_param("sssssssss",$fn, $ln,$email, $password, $address,$city, $province, $country, $pc);
            $added = false;
            if($stmt->execute()){
                echo "User Account Created Sucessfully!";
                $added = true;
            }else{
                echo "User Account Not Created!";
            }
            //echo "DEBUG: Added User!";
            $this->closeSTMT();
            $this->closeCONN();
            return $added;
        }






    }