{/* <i class="bi bi-lock"></i> */}
// const selectedStatus = document.getElementById('selected-status-component');

// const listener = selectedStatus.addEventListener('click', (e) => {

//     console.log('mouse entered');

//     const axleX = e.clientX;
//     const axleY = e.clientY;

//     const selectedStatusRect = selectedStatus.getBoundingClientRect();

//     console.log('AXLE Y: ' + axleY + ' | AXLE X: ' + axleX);
//     console.log('ELEMENT : ' + selectedStatusRect.top, selectedStatusRect.right, selectedStatusRect.bottom, selectedStatusRect.left);

    

function handleUnlockTodo(assignmentStatusSet, assignmentSet, choosedAssignmentStatus) {


    for (let index = 0; index < assignmentStatusSet.length; index++) {

        for (let i = 0; i < assignmentSet.length; i++) {
            // const element = array[i];

            console.log(parseInt(choosedAssignmentStatus));
            if ( isNaN(choosedAssignmentStatus) ) {
                console.log('IF?');
                if (assignmentSet[i]['assignment_status_id']==assignmentStatusSet[index]['id']) {

                    const assignmentId = assignmentSet[i]['id'];
                    const assignmentStatusId = assignmentStatusSet[index]['id'];

                    console.log('unlock-todo-icon-'+assignmentStatusId+'-'+assignmentId);

                    const unlockTodoHtmlElement = document.getElementById('unlock-todo-icon-'+assignmentStatusId+'-'+assignmentId);
                    
                    unlockTodoHtmlElement.addEventListener('click', (e) => {
                        console.log('Clicked unlock of status' + assignmentStatusId+'-'+assignmentId );
                        const firstElement = unlockTodoHtmlElement.firstElementChild;
                        if(firstElement.classList.contains("bi-unlock")){
                            unlockTodoHtmlElement.removeChild(unlockTodoHtmlElement.firstElementChild);
                            const newIcon = document.createElement('i');
                            newIcon.classList.add('bi');
                            newIcon.classList.add('bi-lock');
                            unlockTodoHtmlElement.appendChild(newIcon);
                            unlockTodoHtmlElement.style.opacity = 0;
                        } else {
                            unlockTodoHtmlElement.removeChild(unlockTodoHtmlElement.firstElementChild);
                            const newIcon = document.createElement('i');
                            newIcon.classList.add('bi');
                            newIcon.classList.add('bi-unlock');
                            unlockTodoHtmlElement.style.opacity = 0;
                            unlockTodoHtmlElement.appendChild(newIcon);
                        };
            
                        setTimeout( () => {
                            unlockTodoHtmlElement.style.opacity=1;
                        }, 250);
                        
            
                    });

                    console.log('Listening' + assignmentStatusId + '-' + assignmentStatusId );
                }

            } else {

                const choosedAssignmentStatusInt = parseInt(choosedAssignmentStatus);
                if ( assignmentSet[i]['assignment_status_id'] == assignmentStatusSet[index]['id'] && assignmentStatusSet[index]['id'] == choosedAssignmentStatusInt) {

                    const assignmentId = assignmentSet[i]['id'];
                    const assignmentStatusId = assignmentStatusSet[index]['id'];

                    console.log('unlock-todo-icon-'+assignmentStatusId+'-'+assignmentId);

                    const unlockTodoHtmlElement = document.getElementById('unlock-todo-icon-'+assignmentStatusId+'-'+assignmentId);
                    
                    unlockTodoHtmlElement.addEventListener('click', (e) => {
                        console.log('Clicked unlock of status' + index );
                        const firstElement = unlockTodoHtmlElement.firstElementChild;
                        if(firstElement.classList.contains("bi-unlock")){
                            unlockTodoHtmlElement.removeChild(unlockTodoHtmlElement.firstElementChild);
                            const newIcon = document.createElement('i');
                            newIcon.classList.add('bi');
                            newIcon.classList.add('bi-lock');
                            unlockTodoHtmlElement.appendChild(newIcon);
                            unlockTodoHtmlElement.style.opacity = 0;
                        } else {
                            unlockTodoHtmlElement.removeChild(unlockTodoHtmlElement.firstElementChild);
                            const newIcon = document.createElement('i');
                            newIcon.classList.add('bi');
                            newIcon.classList.add('bi-unlock');
                            unlockTodoHtmlElement.style.opacity = 0;
                            unlockTodoHtmlElement.appendChild(newIcon);
                        };
            
                        setTimeout( () => {
                            unlockTodoHtmlElement.style.opacity=1;
                        }, 250);
                        
            
                    });

                    console.log('Listening' + assignmentStatusId + '-' + assignmentStatusId );
                }

            }
            
        }
        // const element = assignmentStatusSet[index];
        

    }



}

// handleUnlockTodo();