function handleNewTodoClose() {

    console.log('handleNewTodoClose');

    const closeNewTodoModalButtons = document.querySelectorAll('.close-container, .close-modal');

    var count = 0;

    closeNewTodoModalButtons.forEach( element => {

        count ++;

        element.addEventListener('click', () => {

            console.log('Close modal clicked');

            const modal = document.querySelectorAll('.modal-container');

            modal.forEach( element => {
                
                element.classList.remove('modal-closed');
                element.classList.add('modal-closed');
                console.log('Modal closed but where is the animation');
                // Same duration as the animation of close modal
                setTimeout( () => {

                    element.classList.add('transparent');

                }, 500);
            });

        });

        console.log('Listening '+count+' close new todo modal buttons');

    });

}

function saveNewTodo() {

    // send-new-todo
    const saveTodoInput = document.getElementById('save-container');
    saveTodoInput.addEventListener('click', async () => {

        return new Promise((resolve, reject) => {
            const title = document.getElementById('newTodoTitle').value;
            const description = document.getElementById('newTodoDescription').value;
            const owner_id = parseInt(document.getElementById('newTodoOwner').value);
            const assignment_status_id = parseInt(document.getElementById('newTodoStatus').value);
            const assignment_types_id = parseInt(document.getElementById('newTodoTypes').value);
            const body = { "title" : title, "description" : description, "owner_id" : owner_id,
             "assignment_status_id" : assignment_status_id, "assignment_types_id" : assignment_types_id};
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                // Typical action to be performed when the document is ready:
                //    document.getElementById("demo").innerHTML = xhttp.responseText;
                    // console.log(JSON.parse(this.response));
                    console.log(this.response);
                    document.getElementById('close-new-todo-modal').click();
                    
                    //DISPLAY MODAL BEFORE RESOLVE
                    resolve(JSON.parse(this.response));
                    
                } else {
                    if( this.readyState == 4 && this.status > 250){

                        //DISPLAY MODAL BEFORE REJECT
                        reject(this.response);

                    }
                }
            };
            xhttp.open('POST', 'http://localhost:3000/assignment/', true);
            // NEED TO SET CONTENT TYPE WHEN ENDPOINT REQUIRES A JSON BODY
            xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            xhttp.send(JSON.stringify(body));
            console.log(body);
        });
        
    });

}