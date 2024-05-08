<?php
include("dbaccess.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $json_str = file_get_contents('php://input');
    $json_obj = json_decode($json_str, true);

    $salutations = isset($json_obj["salutations"]) ? $json_obj["salutations"] : null;
    $firstname = isset($json_obj["firstname"]) ? $json_obj["firstname"] : null;
    $lastname = isset($json_obj["lastname"]) ? $json_obj["lastname"] : null;
    $email = isset($json_obj["email"]) ? $json_obj["email"] : null;
    $password = isset($json_obj["password"]) ? $json_obj["password"] : null;
    $username = isset($json_obj["username"]) ? $json_obj["username"] : null;
    $street = isset($json_obj["street"]) ? $json_obj["street"] : null;
    $city = isset($json_obj["city"]) ? $json_obj["city"] : null;
    $zip = isset($json_obj["zip"]) ? $json_obj["zip"] : null;
    $payment = isset($json_obj["payment"]) ? $json_obj["payment"] : null;

    // TODO: Add registration logic
    

    // If the registration is successful
    if (true) { // Replace with condition
        // Start a session and set some session variables
        session_start();
        $_SESSION["firstname"] = $firstname;
        $_SESSION["lastname"] = $lastname;

        // Data prep
        $data = array(
            "status" => "Registered",
            "salutations" => $salutations,
            "username" => $username,
            "email" => $email,
            "street" => $street,
            "city" => $city,
            "zip" => $zip,
            "payment" => $payment
        );

        // Send data to frontend
        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        
        $data = array(
            "status" => "RegistrationFailed"
        );

        
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
?>