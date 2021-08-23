<?php
require 'resful_api.php';
class api extends restful_api{
    function __construct(){
        parent::__construct();
    }

    function user(){
        if ($this->method == 'GET'){
            $connection = new mysqli("localhost", 'root', '','laravel_demo');
            $query = $connection->query('SELECT * FROM customers');
            $data = array();
            while($row = $query->fetch_assoc()){
                $data[] = $row;
            }
            $this->response(200, $data);
        }else if ($this->method == 'POST'){
            $firstname = '';
            $lastname = '';
            $phone = '';
            $email = '';
            $address = '';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["firstname"])) {
                    $firstname = $_POST['firstname'];
                }
                if (isset($_POST["lastname"])) {
                    $lastname = $_POST['lastname'];
                }
                if (isset($_POST["phone"])) {
                    $phone = $_POST['phone'];
                }
                if (isset($_POST["email"])) {
                    $email = $_POST['email'];
                }
                if (isset($_POST["address"])) {
                    $address = $_POST['address'];
                }
            }
            $connection = new mysqli("localhost", 'root', '','laravel_demo');
            $query = $connection->query("INSERT INTO customers (firstname, lastname, phone, email, address)
    VALUES ('$firstname', '$lastname', '$phone', '$email','$address')");
            if ($query === TRUE) {
                echo "Thêm dữ liệu thành công";
            } else {
                echo "Error: " . "<br>" . $connection->error;
            }
//Đóng database
            $connection->close();
        }
    }
}

$user_api = new api();
