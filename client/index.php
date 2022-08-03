<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
    //HTTP_HOST Contains the entire URL!
	$uri .= $_SERVER['HTTP_HOST'];
    // $port = ':8080';
    // $uri .= $port;

    //Function to verify if user is logged-in
    //and token is authentic is called.
    $verifiedToken=true;

    if($_COOKIE && isset($_COOKIE['token']) && $verifiedToken===true){
        header('Location: '.$uri.'/client/dashboard/');
    }else{
        header('Location: '.$uri.'/client/login.php');

    }
	exit;
?>
Something is wrong with the XAMPP installation :-(
