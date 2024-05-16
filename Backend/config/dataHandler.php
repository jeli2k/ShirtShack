<?php
include("../models/customer.php");
include("dbaccess.php");

class DataHandler {
    private $conn;

    function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function queryCustomers() {
        $res = array();
        $sql = "SELECT * FROM customers";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($res, new Customer($row["id"], $row["username"], $row["password"], $row["email"], $row["street"], $row["city"], $row["zip"], $row["payment_option"]));
            }
        }

        return $res;
    }

    public function queryCustomerById($id) {
        foreach ($this->queryCustomers() as $val) {
            if ($val->id == $id) {
                return $val;
            }
        }

        return null;
    }

    public function queryCustomerByUsername($username) {
        foreach ($this->queryCustomers() as $val) {
            if ($val->username == $username) {
                return $val;
            }
        }

        return null;
    }

    public function updateCustomer($customer) {
        $sql = "INSERT INTO customers (username, password, email, street, city, zip, payment_option) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssss", $customer->username, $customer->password, $customer->email, $customer->street, $customer->city, $customer->zip, $customer->payment_option);
    
        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }
    }
}