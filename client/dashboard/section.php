<div id="section-wrapper" class="section-wrapper">
    <div id="section" class="section">
        <?php 
            if($_GET && isset($_GET['status']) && $_GET['status']!='all'):
                //BUSCA E ACESSA OS DADOS DO ARRAY CONTENDO O ID DO STATUS SELECIONADO
                foreach ($assignmentStatusSet as $assignmentStatus) :
                    # code...
                    if ($assignmentStatus['id']==$_GET['status']) :
                        $assignmentStatusId  = $assignmentStatus['id'];
                        $assignmentStatusTitle = $assignmentStatus['title'];
                        $assignmentStatusDescription = $assignmentStatus['description'];
                    
                
        ?>
        

        <div class="selected-status-container">
            <div id="selected-status-component" class="selected-status-component">
                <h1 class="selected-status-title"><?php echo($assignmentStatusTitle) ?></h1>
                <p class="selected-status-description"><?php echo($assignmentStatusDescription) ?></p>
            </div>
        </div>
        
        <div class="column-12-container">
            <div class="column-12-title">
                <h3><?php echo($assignmentStatusTitle); ?> list</h3>
                <button id="<?php echo($assignmentStatusId) ?>" class="input-new-assignment">
                    <i class="bi bi-plus"></i>
                </button>
            </div>
            <div class="column-12-body">
                
            
                <!-- <div class="card-container">
                        <div class="todo-icons">
                            <div class="edit-todo-icon">
                                <i class="bi bi-pencil-square"></i>
                            </div>
                            <div class="delete-todo-icon">
                                <i class="bi bi-x-square"></i>
                            </div>
                        </div>
                        <br>
                        
                        <div class="card-title-container">
                            <h4 class="card-title">Card 1</h4>
                        </div>
                        <div class="card-description-container">
                            <p class="card-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit nobis earum voluptatum molestiae beatae, quibusdam rerum delectus enim unde assumenda in? Omnis delectus ducimus quae. Illo repellendus ut nihil corporis.</p>
                        </div>
                </div> -->
                <?php
                // if($assignmentsSet){

                // }
                
                foreach ($assignmentsSet as $key => $value) :
                    # code...
                    // var_dump($assignmentsSet[$key]);
                    // die();
                    if( $value['assignment_status_id'] && $value['assignment_status_id']==$assignmentStatusId ):
                        $assignmentTitle = $value['title'];
                        $assignmentDescription = $value['description'];
                
                ?>
                <div class="card-container">
                        <div class="todo-icons">
                            <div id="unlock-todo-icon-<?php echo($assignmentStatusId.'-'.$value['id']);?>" class="unlock-todo-icon" value="<?php echo($assignmentStatusId);?>">
                                <i class="bi bi-lock"></i>
                            </div>
                            <div class="edit-todo-icon">
                                <i class="bi bi-pencil-square"></i>
                            </div>
                            <div class="delete-todo-icon">
                                <i class="bi bi-x-square"></i>
                            </div>
                        </div>
                        <br>
                        <div class="card-title-container">
                            <h4 class="card-title"><?php echo($assignmentTitle) ?></h4>
                        </div>
                    <div class="card-description-container">
                        <p class="card-description">
                            <?php echo($assignmentDescription) ?>
                        </p>
                    </div>
                </div>
                <?php
                    endif;
                endforeach;

                ?>
            </div>
            <div class="column-12-cards-bottom"></div>
        </div>
        <!-- <div class="column-12-divisor"></div> -->
        <?php       
                    endif; 
                endforeach; 
            else: ?>
            <div class="selected-status-container">
                <div id="selected-status-component" class="selected-status-component">
                    <h1 class="selected-status-title">All</h1>
                    <p class="selected-status-description">All your tasks.</p>
                </div>
            </div>
        
        <div class="status-columns-container">


        <?php

            // CRIA UMA NOVA COLUNA PARA CADA STATUS DE TAREFAS
                if( isset($assignmentStatusSet) && count($assignmentStatusSet)>0 ) :
                    foreach ($assignmentStatusSet as $assignmentStatus) :
                        $assignmentStatusId  = $assignmentStatus['id'];
                        $assignmentStatusTitle = $assignmentStatus['title'];
                        $assignmentStatusDescription = $assignmentStatus['description'];
                # code...
        ?>
            <div class="column-4-container">
                <div class="column-4-title">
                    <h3><?php echo($assignmentStatusTitle); ?> list</h3>
                    <button id="<?php echo($assignmentStatusId) ?>" class="input-new-assignment">
                        <i class="bi bi-plus"></i>
                    </button>
                </div>
                <div class="column-4-body">

                
                    <!-- <div class="card-container">
                        <div class="todo-icons">
                            <div id="unlock-todo-icon-<?php echo($assignmentStatusId);?>" class="unlock-todo-icon" value="<?php echo($assignmentStatusId);?>">
                                <i class="bi bi-unlock"></i>
                            </div>
                            <div class="edit-todo-icon">
                                <i class="bi bi-pencil-square"></i>
                            </div>
                            <div class="delete-todo-icon">
                                <i class="bi bi-x-square"></i>
                            </div>
                        </div>
                        <br>
                        <div class="card-title-container">
                            <h4 class="card-title">Card 1 title Lorem ipsum dolor sit amet consectetur adipisicing</h4>
                        </div>
                        <div class="card-description-container">
                            <p class="card-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit nobis earum voluptatum molestiae beatae, quibusdam rerum delectus enim unde assumenda in? Omnis delectus ducimus quae. Illo repellendus ut nihil corporis.</p>
                        </div>
                    </div> -->
                    <?php
                    foreach ($assignmentsSet as $key => $value) :
                        # code...
                        // var_dump($assignmentsSet[$key]);
                        // die();
                        if( $value['assignment_status_id'] && $value['assignment_status_id']==$assignmentStatusId ):
                            $assignmentTitle = $value['title'];
                            $assignmentDescription = $value['description'];
                    ?>
                    <div class="card-container">
                            <div class="todo-icons">
                                <div id="unlock-todo-icon-<?php echo($assignmentStatusId.'-'.$value['id']);?>" class="unlock-todo-icon" value="<?php echo($assignmentStatusId);?>">
                                    <i class="bi bi-lock"></i>
                                </div>
                                <div class="edit-todo-icon">
                                    <i class="bi bi-pencil-square"></i>
                                </div>
                                <div class="delete-todo-icon">
                                    <i class="bi bi-x-square"></i>
                                </div>
                            </div>
                            <br>
                            <div class="card-title-container">
                                <h4 class="card-title"><?php echo($assignmentTitle) ?></h4>
                            </div>
                        <div class="card-description-container">
                            <p class="card-description">
                            <?php echo($assignmentDescription) ?>
                            </p>
                        </div>
                    </div>
                    <?php
                        endif;
                    endforeach;

                    ?>
                </div>
                <div class="column-4-cards-bottom"></div>
            </div>
            <!-- <div class="column-4-divisor"></div> -->
        <?php
                    endforeach;
                endif;
        ?>
        </div>
    </div>
        <?php
            endif;      
        ?>
</div>