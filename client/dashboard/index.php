<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- <link rel="stylesheet" href="./css/headerStyle.css"> -->
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> -->
    
</head>
<style>
    <?php include __DIR__.'/css/headerStyle.css'; ?>
    <?php include_once(__DIR__."/css/sectionStyle.css"); ?>
    <?php include_once(__DIR__."/css/footerStyle.css"); ?>
</style>
<body id="body">
    <?php
    include dirname(__FILE__).'/../api/user/getUser.php';
    include_once dirname(__FILE__).'/../api/work/assignmentStatus.php';
    include_once dirname(__FILE__).'/../api/work/assignments.php';

    // SE COOKIE DE SESSAO ESTIVER ATIVO BUSCA OS DADOS DO USUARIO...
    if($_COOKIE && isset($_COOKIE['id'])){

        //GET DADOS DO USUARIO
        $response = getUserData();
        if($response && isset($response['name'])){
            $username = $response['name'];

            //GET TAREFAS CRIADAS PELO USUARIO E ATRIBUIDAS AO USUARIO
            // $assignments = getAssignments();
            // if($assignments && isset($assignments['assignments'])){
            //     $assignmentsSet = $assignments['assignments'];
            // }

        }

    }
    include_once("./header.php");

    include_once("./section.php");

    include_once("./footer.php");

    ?>
</body>
<script>
    <?php 
    include __DIR__.'/js/toggleNav.js'; 
    include_once(__DIR__."/js/toggleFooter.js"); 
    ?>
    listenScroll();
    toggleNav();
</script>
</html>