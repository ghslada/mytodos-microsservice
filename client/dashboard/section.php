<div id="section-wrapper" class="section-wrapper">
    <div id="section" class="section">
        <?php 
            if($_GET && isset($_GET['status']) && $_GET['status']!='all'):
                //BUSCA E ACESSA OS DADOS DO ARRAY CONTENDO O ID DO STATUS SELECIONADO
                foreach ($assignmentStatusSet as $assignmentStatus) :
                    # code...
                    if ($assignmentStatus['id']==$_GET['status']) :
                        $assignmentStatusTitle = $assignmentStatus['title'];
                        $assignmentStatusDescription = $assignmentStatus['description'];
                    
                
        ?>
        <div class="selected-status-container">
            <div class="selected-status-component">
                <h1 class="selected-status-title"><?php echo($assignmentStatusTitle) ?></h1>
                <p class="selected-status-description"><?php echo($assignmentStatusDescription) ?></p>
            </div>
        </div>
        
        <div class="column-12-container">
            <div class="column-12-title">
                <h3><?php echo($assignmentStatus['title']); ?> list</h3>
                <button class="input-new-assignment">
                    <i class="bi bi-plus"></i>
                </button>
            </div>
                <div class="card-container">
                    <div class="card-title-container">
                        <h4 class="card-title">Card 1 title</h4>
                    </div>
                    <div class="card-description-container">
                        <p class="card-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit nobis earum voluptatum molestiae beatae, quibusdam rerum delectus enim unde assumenda in? Omnis delectus ducimus quae. Illo repellendus ut nihil corporis.</p>
                    </div>
                </div>
            <div class="column-12-cards-bottom"></div>
        </div>
        <!-- <div class="column-12-divisor"></div> -->
        <?php       
                    endif; 
                endforeach; 
            else: ?>
            <div class="selected-status-container">
                <div class="selected-status-component">
                    <h1 class="selected-status-title">All</h1>
                    <p class="selected-status-description">Result of assignments without using any filter</p>
                </div>
            </div>
        
        <div class="status-columns-container">


        <?php

            // CRIA UMA NOVA COLUNA PARA CADA STATUS DE TAREFAS
                if( isset($assignmentStatusSet) && count($assignmentStatusSet)>0 ) :
                    foreach ($assignmentStatusSet as $assignmentStatus) :
                # code...
        ?>
            <div class="column-4-container">
                <div class="column-4-title">
                    <h3><?php echo($assignmentStatus['title']); ?> list</h3>
                    <button class="input-new-assignment">
                        <i class="bi bi-plus"></i>
                    </button>
                </div>
                    <div class="card-container">
                        <div class="card-title-container">
                            <h4 class="card-title">Card 1 title</h4>
                        </div>
                        <div class="card-description-container">
                            <p class="card-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit nobis earum voluptatum molestiae beatae, quibusdam rerum delectus enim unde assumenda in? Omnis delectus ducimus quae. Illo repellendus ut nihil corporis.</p>
                        </div>
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