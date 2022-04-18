<?php

include_once('connection.php');

userLogin();

function userLogin() {
    if($_POST && $_POST['email'] && $_POST['password'] && strlen($_POST['password'])>0 && strlen($_POST['email'])>0){

            //TESTE POST REQUEST PARA A API
            $fields = [
                'email' => $_POST['email'],
                'senha' => $_POST['password'],
            ];
            $url = "http://localhost:3000/login";
            $result = requestLogin ($url, $fields);
            session_start();
            if($result && isset($result['id'])){
                $_SESSION['id'] = $result['id'];
                setcookie('id', $result['id'], strtotime('+30 days'));
                header("Location: /client/dashboard");

            }else {
                //SE O RESULT DA REQUEST FOR NULL SIGNIFICA QUE NAO RECEBEMOS RESPOSTA DA API
                if(!$result):
                    echo('
                    <div class="generated-center" style="display: flex; align-items: center; justify-content: center">
                        <p style="display: block; text-align: center; width: fit-content; min-width: 50%; height: 100%; float: center; background-color: red; opacity: 0.75; color: white; font-family: "Times New Roman", Times, serif;">Serviço de login fora do ar... Tente novamente mais tarde</p>
                    </div>
                    ');
                else:
                    echo('
                    <div class="generated-center" style="display: flex; align-items: center; justify-content: center">
                        <p style="display: block; text-align: center; width: fit-content; min-width: 50%; height: 100%; float: center; background-color: red; opacity: 0.75; color: white; font-family: "Times New Roman", Times, serif;">'.$result['error'].'</p>
                    </div>
                    ');
                endif;
            }
    }
}

function requestLogin ($endpoint, $data) {
    $url = $endpoint;    
    $content = json_encode($data);

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER,
            array("Content-type: application/json"));
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

    $json_response = curl_exec($curl);

    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    if ( $status > 201 && $status != 500 ) {
        echo("<script>console.log('Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl)."');</script>");
    }


    curl_close($curl);

    $response = json_decode($json_response, true);
    // print_r($response);
    return $response;
}





?>