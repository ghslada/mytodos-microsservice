<!-- Button trigger modal -->
<?php
function messageModal($text) {

?>
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
    </button> -->

    <!-- Modal -->
    
    <div id="message-container" class="message-container">
        <span class="close-container">
            <i class="bi bi-x-square text-danger"></i>
        </span>
        <div class="message-header">
            <h4 id="message-title">New taskaaaaaaaaaaaaaaaaaaaaaaaaaa</h4>
        </div>
        <div class="message-body">
            <p>
                
                <?php echo($text) ?>
                aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
            </p>
        </div>
        <div class="message-footer">
            <!-- <div id="save-container" class="save-container">
                <button class="btn btn-light">Save</button>
            </div> -->
        </div>
 
    </div>

<?php
}
// messageModal('Test');
?>