
<?php
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <script src="js/registerSelectChanges.js"></script>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/generatedHTML.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                
                                <div data-mutant-attributes="height" id="dinamicHeight" class="dinamicHeight1 card shadow-lg border-0 rounded-lg mt-7">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="api/user/createUser.php">
                                        <div class="row mb-3 inputs-container">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="name" id="inputFirstName" type="text" placeholder="Crie a senha" />
                                                        <label for="inputFirstName">First name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="lastName" id="inputLastName" type="text" placeholder="Confirme a senha" />
                                                        <label for="inputLastName">Last name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Crie a senha" />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirme a senha" />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="address" id="inputEndereco" type="text" placeholder="name@example.com" />
                                                <label for="inputEndereco">Address</label>
                                            </div>
                                            <div class="form-floating mb-3 generated" id="insertAfterCountry">
                                                <!-- <input class="form-control" name="input" id="inputCEP" type="text" placeholder="96105-103" /> -->
                                                <!-- <h6>Select your country: </h6> -->
                                                
                                                <?php 
                                                        include_once("api/user/createUser.php");
                                                        echo'<select name="country" onChange="onCountryChange()" id="country" class="form-control">
                                                        <option value="0"> ------- </option>';
                                                        generateCountryOptions(); 
                                                        echo("</select>");
                                                        //NECESSARIO FECHAR O SELECT DEPOIS DE GERAR AS OPTIONS.
                                                    ?>
                                                <label for="country"><b>Select your country</b></label>                         
                                            </div>
                                            <div><p id="state-display">This paragraph will receive the response cointaining the state HTML select`s from the Ajax request!</p>
                                            </div>
                                            <div><p id="city-display">This paragraph will receive the response cointaining the city HTML select`s from the Ajax request!</p></div>
                                            
                                            <div class="form-floating mb-3" id="phone">
                                                <input class="form-control" name="phone" id="inputTelefone" type="phone" placeholder="54 99239-4812" />
                                                <label for="inputTelefone">Phone</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <button class="btn btn-primary btn-block" type="submit" name="submit" class="d-grid">Create Account</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Já possui uma conta? Ir para o login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!-- <script src="js/scripts.js"></script> -->
        <script>

            //CREATE STATE SELECT THAT WILL BE DESTROYED AND INSERT AFTER COUNTRY SELECT
            const stateContainer = document.createElement("div");
            stateContainer.classList.add('form-floating');
            stateContainer.classList.add('mb-3');
            stateContainer.classList.add('destroy');
            stateContainer.id='state-destroy';
                
                
            const stateSelect = document.createElement("select");
            stateSelect.className='form-control mb-3';
            stateSelect.id='stat';

            const stateOption = document.createElement("option");
            const stateOptionText = document.createTextNode(" ------- ");
            const stateLabel = document.createElement("label");
            stateLabel.htmlFor="stat";
            const stateLabelText = document.createTextNode("Select your state");
            const negritoStyle = document.createElement("b");

            //APPEND HTML TO MAKE THE STATE SELECT STRUCTURE
            negritoStyle.appendChild(stateLabelText);
            stateLabel.appendChild(negritoStyle);
            stateOption.appendChild(stateOptionText);
            stateSelect.appendChild(stateOption);
            stateContainer.appendChild(stateSelect);
            stateContainer.appendChild(stateLabel);

            
              //CREATE CITY SELECT THAT WILL BE DESTROYED AND INSERT AFTER COUNTRY SELECT 
            const cityContainer = document.createElement("div");
            cityContainer.classList.add('form-floating');
            cityContainer.classList.add('mb-3');
            cityContainer.classList.add('destroy');
            
                
                
            const citySelect = document.createElement("select");
            citySelect.className='form-control mb-3';
            citySelect.id='cit';

            const cityOption = document.createElement("option");
            const cityOptionText = document.createTextNode(" ------- ");
            const cityLabel = document.createElement("label");
            cityLabel.htmlFor="cit";
            const cityLabelText = document.createTextNode("Select your city");
            const negrito2Style = document.createElement("b");
            //APPEND HTML TO MAKE THE STATE SELECT STRUCTURE
            negrito2Style.appendChild(cityLabelText);
            cityLabel.appendChild(negrito2Style);
            cityOption.appendChild(cityOptionText);
            citySelect.appendChild(cityOption);
            cityContainer.appendChild(citySelect);
            cityContainer.appendChild(cityLabel);

            

            const observerState = new MutationObserver(function(mutations_list) {
                mutations_list.forEach(function(mutation) {
                    mutation.removedNodes.forEach(function(removed_node) {
                        if(removed_node.id == 'state-container') {
                            console.log('#state-container has been removed');
                            // observer.disconnect();
                            const lastSelect = document.getElementById("insertAfterCountry");
                            // insert a new node after the last list item
                            insertAfter(stateContainer, lastSelect);
                            $('.destroy').bind('animationend webkitAnimationEnd onAnimationEnd MSAnimationEnd', function(e) { $(this).remove(); });


                            

                        }
                    });
                });
            });

            observerState.observe(document.querySelector("#state-display"), { subtree: false, childList: true });


          

            
            const observerCity = new MutationObserver(function(mutations_list) {
                mutations_list.forEach(function(mutation) {
                    mutation.removedNodes.forEach(function(removed_node) {
                        if(removed_node.id == 'city-container') {
                            console.log('#city-container has been removed');
                            
                                const phoneInput = document.getElementById("phone");
                                const reference = phoneInput.parentNode;
                                console.log('ELSEEEEEEEE');
                                // insert a new node after the last list item
                                // insertAfter(cityContainer, lastSelect);
                                reference.insertBefore(cityContainer, phoneInput);
                                $('.destroy').bind('animationend webkitAnimationEnd onAnimationEnd MSAnimationEnd', function(e) { $(this).remove(); });


                        }
                    });
                });
            });

            observerCity.observe(document.querySelector("#city-display"), { subtree: false, childList: true });

            
            
            function insertAfter(newNode, referenceNode) {
                referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling)
            }

            

        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">

            
            
        </script>
    </body>
</html>