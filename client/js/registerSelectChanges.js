// onCountryChange();

function onCountryChange() {

        const element = document.querySelector("#country");
        const result = element.options[element.selectedIndex].value;
        console.log(result);

        if(result){
            
            document.getElementById("city-display").innerHTML='';

            var formData = new FormData();
            formData.append("country", result);

            const stateExists = document.getElementById("state"); 

            if(stateExists && stateExists.innerText>0){
                const stateElement = document.querySelector("#state");
                const stateResult = stateElement.options[stateElement.selectedIndex].value;
                formData.append("state", stateResult);
            }

            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function() {
                if(document.getElementById("state-display").innerHTML != this.responseText){
                    document.getElementById("state-display").innerHTML = this.responseText;
                }
            }
            
            xmlhttp.open("POST", "/client/api/user/createUser.php");
            sessionStorage.Country=result;
            xmlhttp.send(formData);

        }          

}


function onStateChange() {

        const element = document.querySelector("#state");
        const result = element.options[element.selectedIndex].value;
        console.log(result);

        if(result){
            document.getElementById("state-display").innerHTML='';
            document.getElementById("city-display").innerHTML='';
            var formData = new FormData();
            formData.append("country", sessionStorage.Country);
            formData.append("state", result);

            const cityExists = document.getElementById("city"); 

            if(cityExists && cityExists.innerText>0){
                const cityElement = document.querySelector("#city");
                const cityResult = cityElement.options[cityElement.selectedIndex].value;
                formData.append("city", cityResult);
            }

            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function() {
                if(document.getElementById("state-display").innerHTML != this.responseText){
                    document.getElementById("state-display").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("POST", "/client/api/user/createUser.php");
            sessionStorage.State=result;
            xmlhttp.send(formData);

        }

}

function onCityChange() {

        const element = document.querySelector("#city");
        const result = element.options[element.selectedIndex].value;
        console.log(result);

        if(result){
            var formData = new FormData();
            document.getElementById("state-display").innerHTML='';
            document.getElementById("city-display").innerHTML='';
            formData.append("country", sessionStorage.Country);
            formData.append("state", sessionStorage.State);
            formData.append("city", result);
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function() {
                if(document.getElementById("city-display").innerHTML != this.responseText){
                    document.getElementById("city-display").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("POST", "/client/api/user/createUser.php");
            sessionStorage.City=result;
            xmlhttp.send(formData);

        }

}