<?php

//GET REQUEST
$ch = curl_init("localhost:3000/users"); // such as http://example.com/example.xml
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch);
curl_close($ch);
var_dump($data);



//POST REQUEST
echo file_get_contents('https://www.server.com', false, stream_context_create([
    'http' => [
        'method' => 'POST',
        'header'  => "Content-type: application/x-www-form-urlencoded",
        'content' => http_build_query([
            'key1' => 'Hello world!', 'key2' => 'second value'
        ])
    ]
]));

?>
