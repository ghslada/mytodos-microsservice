function listenSelectedStatusHover() {

    const selectedStatus = document.getElementById('selected-status-component');

    const listener = selectedStatus.addEventListener('click', (e) => {

        console.log('mouse entered');

        const axleX = e.clientX;
        const axleY = e.clientY;

        const selectedStatusRect = selectedStatus.getBoundingClientRect();

        console.log('AXLE Y: ' + axleY + ' | AXLE X: ' + axleX);
        console.log('ELEMENT : ' + selectedStatusRect.top, selectedStatusRect.right, selectedStatusRect.bottom, selectedStatusRect.left);

        

        // VERIFY WICH SIDE THE MOUSE HOVERED;
        if ( (selectedStatusRect.right+selectedStatusRect.left)/2>axleX ) {
            // WHEN MOUSE HOVER ELEMENT IN THE LEFT SIDE;
            console.log('ELEMENT MIDDLE : '+(selectedStatusRect.right+selectedStatusRect.left)/2);
            console.log('AXLE Y: ' + axleY + ' | AXLE X: ' + axleX);
            selectedStatus.style.transform = 'var(--var-status-display-left)';
            setTimeout(()=>{
                selectedStatus.style.opacity = 0;
            },650);
            setTimeout(()=>{
                selectedStatus.style.opacity = 0;
                selectedStatus.style.display = 'none';
                selectedStatus.style.backgroundColor = 'blue';
            }, 830);
            setTimeout(() => {
                selectedStatus.style.backgroundColor = 'white';
                selectedStatus.style.display = 'block';
                selectedStatus.style.transform = 'var(--var-status-display-left-reverse)';
            }, 1000);
            setTimeout(()=>{
                selectedStatus.style.opacity = 0;
                // selectedStatus.style.display = 'none';
            },1050);
            setTimeout(() => {
                selectedStatus.style.opacity = 1;
                selectedStatus.style.display = 'block';
                selectedStatus.style.backgroundColor = 'white';
                selectedStatus.style.transform = 'translateX(0)';
            }, 2000);

        } else {
            // WHEN MOUSE HOVER ELEMENT IN THE RIGHT SIDE;
            console.log('ELEMENT MIDDLE : ',(selectedStatusRect.right+selectedStatusRect.left)/2);
            console.log('AXLE Y: ' + axleY + ' | AXLE X: ' + axleX);
            selectedStatus.style.transform = 'var(--var-status-display-right)';
            setTimeout(()=>{
                selectedStatus.style.opacity = 0;
            },650);
            setTimeout(()=>{
                selectedStatus.style.opacity = 0;
                selectedStatus.style.display = 'none';
                selectedStatus.style.backgroundColor = 'blue';
            }, 830);

            setTimeout(() => {
                selectedStatus.style.backgroundColor = 'white';
                selectedStatus.style.display = 'block';
                selectedStatus.style.transform = 'var(--var-status-display-right-reverse)';
            }, 1000);
            setTimeout(()=>{
                selectedStatus.style.opacity = 0;
                // selectedStatus.style.display = 'none';
            },1050);
            setTimeout(() => {
                selectedStatus.style.opacity = 1;
                selectedStatus.style.display = 'block';
                selectedStatus.style.transform = 'translateX(0)';
            }, 2000);

        }
        
    });
}

listenSelectedStatusHover();