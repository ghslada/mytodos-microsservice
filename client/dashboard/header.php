<?php 
    $assignmentStatus = getAssignmentStatus();
    if( isset($assignmentStatus['assignmentStatusSet']) ) {
        $assignmentStatusSet = $assignmentStatus['assignmentStatusSet'];
    } else {
        echo('<script>window.dialog("Erro ao carregar dados dos status de tarefas. Tente novamente daqui alguns minutos.");</script>');
    }
?>
<div id="header" class="header header-up">
    <div class="image-hover-container">

        <div class="image-container">
            <img src="assets/logo.jpg" alt="" class="image">
        </div>
    </div>
    <div class="user-container">
        <div class="user-info-container">
            <p class="user-info">Welcome, <?php if(isset($username)){echo($username);} ?>!</p>
        </div>
    </div>
    <div class="title-container">
        <p class="title">Tasks Manager</p>
    </div>
    <div id="navigation-divisor" class="navigation-divisor">
        </div>

        <button id="nav-toggle-button" class="nav-filter-button">
            <i class="bi bi-list-ul"></i>      
        </button>
        <div id="nav-toggle" class="header-filter-container nav-toggle">

            <div class="my-work-filter-divisor">
                <div class="my-work-filter">
                    <div class="my-work-filter-label">
                        <i class="bi bi-pc-display-horizontal"></i>
                        <label for="">Filter tasks</label>
                    </div>
                    <ul>
                        <?php
                            //FILTRANDO TAREFAS DO FRONTEND A PARTIR DO STATUS ESCOLHIDO
                        if( isset($assignmentStatusSet) && count($assignmentStatusSet)>0 ) :

                        
                            foreach ( $assignmentStatusSet as $assignmentStatus ) :
                            # code...
                        ?>
                        <li>
                            <a href="/client/dashboard?status=<?php echo($assignmentStatus['id']) ?>" class="input-assignment-status" type="submit" ><?php echo($assignmentStatus['title']) ?><a/>
                        </li>
                        <?php
                            endforeach;

                        endif;
                        ?>
                        <li>
                            <a href="/client/dashboard?status=<?php echo('all') ?>" class="input-assignment-status" type="submit" >All</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>

