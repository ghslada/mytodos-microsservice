<?php

if(isset($_POST['country']) && $_POST['country']>0){

    include_once(''.__DIR__.'/../../connection.php');

    if(!isset($_POST['state'])){

        generateStateOptions();  

    }else{

        
        if(isset($_POST['state']) && $_POST['state']>0){
            
            generateStateOptions(); 
            generatePostalCodeOptions();
            
            if(isset($_POST['city']) && $_POST['city']>0){
                
                
                if(isset($_POST['phone']) && strlen($_POST['phone'])>0){
                    
                    createUser();
                    header('Location: /client');
                }
            }

        }else{
            generateStateOptions(); 
          
        }


    }

}else{
    // include_once('././connection.php');
    include_once(''.__DIR__.'/../../connection.php');
    

}



function generateCountryOptions() {

    $sql = "SELECT * FROM country";

    $conn = connectDB();

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($_POST && $_POST['country'] == $row['id']){
            echo "<option value='".$row["id"]."' selected>".$row["name"]."</option>";
        }else{
            echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
        }
    }

    } else {
    echo "0 results";
    }

    disconnectDB($conn);

}

function generateStateOptions() {

    $sql = "SELECT * FROM state WHERE state.country_id=".$_POST['country'].";";

    $conn = connectDB();

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    echo'
        <div class="form-floating mb-3 generated" id="state-container">
            <select name="state" onChange="onStateChange()" id="state" class="form-control">'; 
            echo('<option value="0"> ------- </option>');
        while($row = $result->fetch_assoc()) {
            if(isset($_POST['state']) && $_POST['state'] == $row['id']){
                echo "<option value='".$row["id"]."' selected>".$row["name"]."</option>";
            }else{
                echo "  <option value='".$row["id"]."'>".$row["name"]."</option>";
            }
            
        }
        echo("
            </select>");
        echo("<label for='state'><b>Select your state</b></label>                                            
        </div>");
    } else {
    echo "0 results";
    }

    disconnectDB($conn);

}

function generatePostalCodeOptions() {

    $sql = "SELECT * FROM city WHERE city.state_id=".$_POST['state']."";

    $conn = connectDB();

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    echo '
    <div class="form-floating mb-3 generated" id="city-container">
    ';
    echo'<select name="city" id="city" onChange="onCityChange()" class="form-control">';
    echo('<option value="0"> ------- </option>');
    while($row = $result->fetch_assoc()) {
        if(isset($_POST['city']) && $_POST['city']==$row['id']){
            echo "<option value='".$row["id"]."' selected>".$row["name"]." - ".$row["postal_code"]."</option>";
        }else{
            echo "<option value='".$row["id"]."'>".$row["name"]." - ".$row["postal_code"]."</option>";
        }
    }
    echo('</select>');
    echo('
          <label for="city"><b>Select your City</b></label>    
    </div>
    ');

    } else {
    echo "0 results";
    }

    disconnectDB($conn);

    }

    function createUser() {

        $conn=connectDB();
        $name=$_POST['name'];
        $lastname=$_POST['lastName'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        // $photo_url=$_POST['photo_url'];
        $city=$_POST['city'];
        $now = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));;
        $created_at = $now->format('Y-m-d H:i:s');    // MySQL datetime format
        // $created_at = $now->getTimestamp();           // Unix Timestamp -- Since PHP 5.3
        $sql = "INSERT INTO user (name, lastname, email, phone, address, city_id)
        VALUES ('$name', '$lastname', '$email', '$phone', '$address', $city)";

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        } else {
        echo "<script>Error: " . $sql . "<br>" . $conn->error."</script>";
        exit();
        }
        disconnectDB($conn);

    }

?>