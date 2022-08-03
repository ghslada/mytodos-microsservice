function toggleNav() {

    var navButton = document.getElementById("nav-toggle-button");
    navButton.addEventListener("click", (e) => {

        const element = document.getElementById("nav-toggle");

        if(element.className.includes("nav-toggle")){
            element.classList.remove("nav-toggle");
            element.offSetWidth;
            element.classList.add("nav-toggled");
            console.log("Added toggled");
        }
            //TESTEEEEE
        // const elementHeader = document.getElementById("header");
        // // window.removeEventListener('scroll', () => {

        // // }, false);
        // window.removeEventListener('scroll', () => {

        // }, false);
    
    });
    


    const ele = document.getElementById("section-wrapper");
    ele.addEventListener("click", e => {

        const element = document.getElementById("nav-toggle");

        if(element.className.includes("nav-toggled")){

            document.getElementById("section").addEventListener("click", (e) => {

                 
                    
            });

            removeToggled(element);
            
    }

    });

    const ele2 = document.getElementById("modal-container");
    ele2.addEventListener("click", e => {

        const element = document.getElementById("nav-toggle");

        if(element.className.includes("nav-toggled")){

            document.getElementById("section").addEventListener("click", (e) => {

                 
                    
            });

            removeToggled(element);
            
        }

    });

}




function removeToggled(element1) {

        if(element1.className.includes("nav-toggled")){
            element1.classList.remove("nav-toggled");
            element1.offSetWidth;
            element1.classList.add("nav-toggle");
            console.log("Added toggle");
        }
    
}