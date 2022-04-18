<?php


function connectDB() {

    $servername = "localhost";
    $username = "convidado";
    $password = "12345";
    $dbname = "mytodos";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;

}

function disconnectDB($conn) {

    $conn->close();
}

?>