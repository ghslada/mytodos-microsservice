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
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<style>



    <?php include_once(__DIR__."/modals/css/messageModal.css"); ?>

    <?php include_once(__DIR__."/css/newTodoStyle.css"); ?>

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
            $userId = $response['id'];

            //GET TAREFAS CRIADAS PELO USUARIO E ATRIBUIDAS AO USUARIO
            $assignments = getAssignments();
            $assignmentsSet=null;
            $assignmentsSet = $assignments['assignmentSet'];
            if($assignments && isset($assignments['assignmentSet'])){
                echo("<script>console.log('Set of tasks received! '+JSON.stringify(".json_encode($assignmentsSet)."))</script>");
            }
            include_once("./header.php");

            // DISPLAY MESSAGE WHEN FAILED OR SUCCESS TO CREATE NEW TASK
            include_once("./modals/messageModal.php");
            // messageModal('Test');

            include_once('./newTodo.php');
            newTodoModal($userId); 
                

            include_once("./section.php");

            include_once("./footer.php");

        }

    } 

    

    ?>
</body>

<script>
    var assignmentStatusCount = <?php echo(count($assignmentStatusSet)) ?>;
    var assignmentStatusSet = <?php echo(json_encode($assignmentStatusSet)) ?>;
    console.log(assignmentStatusCount+" available Status");
    console.log('LIST OF STATUS: '+JSON.stringify(assignmentStatusSet));
    var assignmentSet = <?php echo(json_encode($assignmentsSet))?>;
    var choosedAssignmentStatus = "<?php echo($_GET['status'])?>";
    <?php 
    include_once(__DIR__."/js/toggleNewTodo.js");
    include_once(__DIR__."/js/handleNewTodo.js");
    include __DIR__.'/js/toggleNav.js'; 
    include_once(__DIR__."/js/statusAnimation.js");
    include_once(__DIR__."/js/handleUnlockTodo.js");
    include_once(__DIR__."/js/toggleFooter.js"); 
    ?>
    openNewTodoModal(assignmentStatusSet);
    handleUnlockTodo(assignmentStatusSet, assignmentSet, choosedAssignmentStatus);
    handleNewTodoClose();
    saveNewTodo();
    listenScroll();
    toggleNav();
</script>
</html>