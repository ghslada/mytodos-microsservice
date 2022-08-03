
const scrollUp = "footer-up";
const scrollDown = "footer-down";
let lastScroll = 0;
const elementToBeToggled = document.getElementById("footer-container");

const scrollUpHeader = "header-up";
const scrollDownHeader = "header-down";
const elementHeader = document.getElementById("header");

function listenScroll() { 
    
    window.addEventListener("scroll", (e) => {

        const currentScroll = window.scrollY;
        
        
        if( currentScroll <=0 ) {

            console.log("Touched top of page.");

        }

        if (currentScroll > lastScroll &&
            elementToBeToggled.classList.contains(scrollDown)) {
            
            console.log("Going Down!");
            elementToBeToggled.classList.remove(scrollDown);
            elementToBeToggled.classList.add(scrollUp);

            if (elementHeader.classList.contains(scrollUpHeader)) {
                elementHeader.classList.remove(scrollUpHeader);
                elementHeader.classList.add(scrollDownHeader);
                
            }
            
        }
        else if (currentScroll < lastScroll &&
            elementToBeToggled.classList.contains(scrollUp)) {

                console.log("Going Up!");
                elementToBeToggled.classList.remove(scrollUp);
                elementToBeToggled.classList.add(scrollDown);

                
                if (elementHeader.classList.contains(scrollDownHeader)) {
                    elementHeader.classList.remove(scrollDownHeader);
                    elementHeader.classList.add(scrollUpHeader);
                }
                
        
            
            }

        lastScroll = currentScroll;

        console.log(lastScroll);

        // TOGGLE NAVIGATION HEADER WHEN SCROLL
        if(document.getElementById('nav-toggle').classList.contains('nav-toggled')){
            setTimeout( () => {
                document.getElementById('section-wrapper').focus(e);
                document.getElementById('section-wrapper').click(e);
            }, 100);
        }
        


    }, false);

}

function addClassNameListener(elemId, className, callback) {
    var elem = document.getElementById(elemId);
    var lastClassName = elem.className;
    window.setInterval( function() {   
       var className = elem.className;
        if (className !== lastClassName) {
            callback();   
            lastClassName = className;
        }
    },10);
}
