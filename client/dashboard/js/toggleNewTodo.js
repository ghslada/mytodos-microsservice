// assignmentStatusCount
function openNewTodoModal(assignmentStatusSet) {

    var statusContainer = document.querySelectorAll('.column-12-container');

    var count = 0;

    if ( statusContainer.length == 0  ) {


        statusContainer = document.querySelectorAll('.column-4-container');

        if ( statusContainer.length != 0 ) {

            statusContainer = document.querySelectorAll('.input-new-assignment');

            statusContainer.forEach( element => {

                // The button ID is equal to the choosed status id in the database
                const newTodoButton = document.getElementById(element.id);

                    count++;

                    console.log(element.id);

                    const assignmentStatusItem = assignmentStatusSet[element.id-1];

                    newTodoButton.addEventListener('click', (e) => {
                        
                        console.log('Clicked '+newTodoButton.id);

                        const modal = document.querySelector('.modal-container');

                        modal.classList.remove('transparent');

                        modal.classList.remove('modal-closed');

                        modal.classList.remove('modal-container');

                        modal.classList.add('modal-container');

                        const todoTitle = document.getElementById('newTodoTitle');

                        const modalTitle = document.getElementById('modal-title');

                        console.log(assignmentStatusItem.title);

                        modalTitle.innerHTML= 'New '+assignmentStatusItem.title+' task';

                        const newTodoStatusInput = document.getElementById('newTodoStatus');

                        newTodoStatusInput.value = newTodoButton.id; 

                        newTodoStatusInput.setAttribute('value', newTodoButton.id);

                        console.log('Creating new task for status '+newTodoStatusInput.value+newTodoStatusInput.innerHTML);
                        
                        todoTitle.focus();

                    });
                });

                console.log('Listening '+count+' new todo buttons');

                console.log('if');

        }

        

    } else {

        statusContainer = document.querySelectorAll('.input-new-assignment');

        statusContainer.forEach( element => {

                // The button ID is equal to the choosed status id in the database
                const newTodoButton = document.getElementById(element.id);

                count++;

                console.log(element.id);

                const assignmentStatusItem = assignmentStatusSet[element.id-1];

                newTodoButton.addEventListener('click', (e) => {
                    
                    console.log('Clicked '+newTodoButton.id);

                        const modal = document.querySelector('.modal-container');

                        modal.classList.remove('transparent');

                        modal.classList.remove('modal-closed');

                        modal.classList.remove('modal-container');

                        modal.classList.add('modal-container');

                        const todoTitle = document.getElementById('newTodoTitle');
                        
                        const modalTitle = document.getElementById('modal-title');

                        modalTitle.innerHTML= 'New '+assignmentStatusItem.title+' task';

                        const newTodoStatusInput = document.getElementById('newTodoStatus');

                        newTodoStatusInput.setAttribute('value', newTodoButton.id);

                        console.log('Creating new task for status '+newTodoStatusInput.value);
                        
                        todoTitle.focus();
                        
                        // modalTitle.click();

                });
            });

            console.log('Listening '+count+' new todo buttons');

        // for( var i = 0; i<assignmentStatusCount; i++ ) {

        //     count++;
        //     var statusHtmlId = 'newTodo'+count;

        //     document.getElementById(statusHtmlId).addEventListener('click', () => {

        //         console.log('Listening '+count+' new todo buttons');

        //     });

        // }
        // UNICO

    }

    console.log(count);
    
    // document.getElementById('newTodo').addEventListener('click', () => {

    //     console.log('Button new todo clicked');

    // });

}