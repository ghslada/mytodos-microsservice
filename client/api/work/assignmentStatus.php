<?php

function getAssignmentStatus() {

    //GET REQUEST
    $ch = curl_init("localhost:3000/assignment/status"); // such as http://example.com/example.xml
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    # sending manually set cookie
    // curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cookie: id=".$_COOKIE['id']));
    # SECOND ATTR == TRUE PRA RETORNAR OBJTO ARRAY
    $data = json_decode(curl_exec($ch), true);
    // var_dump($data);
    curl_close($ch);
    return $data;

}

?>