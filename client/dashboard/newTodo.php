<!-- Button trigger modal -->
<?php
function newTodoModal($userId) {

?>
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
    </button> -->

    <!-- Modal -->
    
    <div id="modal-container" class="modal-container transparent">
        <div class="modal-header">
            <span class="close-container">
                <i class="bi bi-x-square text-danger"></i>
            </span>
            <h3 id="modal-title">New task</h3>
        </div>
        <div class="modal-body">
            <form style="width:100%" action="http://localhost:3000/assignment/" method="POST">
                <div class="input-group">
                    <div class="inpuft-group-prepend">
                        <span class="input-group-text">Task title</span>
                    </div>
                    <textarea name="title" value="Title" class="form-control" id="newTodoTitle" aria-label="With textarea"></textarea>
                </div> 
                <input style="display:none" name="assignment_status_id" value="0" type="text" id="newTodoStatus">
                <input id="newTodoOwner" style="display:none" name="owner_id" value="<?php echo($userId) ?>" type="text">
                <input style="display:none" name="assignment_types_id" value="1" type="text" id="newTodoTypes">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Task description</span>
                    </div>
                    <textarea id="newTodoDescription" name="description" value="Description" class="form-control" aria-label="With textarea"></textarea>
                </div> 
                <input id="send-new-todo" type="submit" style="display:none" >
            </form>
                   

        </div>
        <div class="modal-footer">
            <div id="close-new-todo-modal" class="close-modal">
                <button class="btn btn-danger">Close</button>
            </div>
            <div id="save-container" class="save-container">
                <button class="btn btn-light">Save</button>
            </div>
        </div>
    </div>
<?php
}
?>