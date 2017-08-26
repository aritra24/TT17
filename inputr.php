<?php

function redirect_to($new_location)
{
    header("Location: ".$new_location);
    exit;
}
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $firstname = $lastname = $firstname_error = $lastname_error = $pref ='';
        $email = $regno = $phnow = $email_error= $regno_error = $phnow_error = $pref_error = '';

        if (isset($_POST['firstname'])) {
            if(empty($_POST['firstname'])) {
                $firstname_error = 'Firstname is required';
            } else {
                if($_POST['firstname'] == test_input($_POST['firstname'])) {
                     if (preg_match("/^[a-zA-Z ]*$/",$firstname))
                    $firstname = test_input($_POST['firstname']);   
                } else {
                    $firstname_error = 'Only letters and whitespaces allowed';
                }
            }
        }
       if (isset($_POST['lastname'])) {
            if(empty($_POST['lastname'])) {
                $lastname_error = 'Lastname is required';
            } else {
                if($_POST['lastname'] == test_input($_POST['lastname'])) {
                     if (preg_match("/^[a-zA-Z ]*$/",$lastname))
                    $lastname = test_input($_POST['lastname']);
                } else {
                    $lastname_error = 'Only letters and whitespaces allowed';
                }
            }
        }
       if (isset($_POST['email'])) {
            if(empty($_POST['email'])) {
                $email_error = 'Email is required';
            } else {
                 if($_POST['email'] == test_input($_POST['email'])) {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL))
                    $email = test_input($_POST['email']);
                } else {
                    $email_error = 'Enter a valid email address';
                }
            }
        }
        if (isset($_POST['phnow'])) {
            if(empty($_POST['phnow'])) {
                $phnow_error = 'Phone no. is required';
            } else {
                 if($_POST['phnow'] == test_input($_POST['phnow'])) {
                    if (preg_match("/^[7-9]{3}-[0-9]{3}-[0-9]{4}$/",$phnow))
                    $phnow = test_input($_POST['phnow']);
                } else {
                    $phnow_error = 'Enter valid phone no.';
                }
            }
        }
        if (isset($_POST['regno'])) {
            if(empty($_POST['regno'])) {
                $regno_error = 'Enter registration no.';
            } else {
                 if($_POST['regno'] == test_input($_POST['regno'])) {
                    if (preg_match("/1^[34567]{1}[0-9]{7}$/",$regno))
                    $regno = test_input($_POST['regno']);
                } else {
                    $regno_error = 'Enter valid phone no.';
                }
            }
        }
         if (isset($_POST['pref'])) {
            if(empty($_POST['pref'])) {
                $pref_error = 'Enter a preference';
            } else {
                 if($_POST['pref'] == test_input($_POST['pref'])) {
                    if (preg_match("/^Gaming$/",$pref) || preg_match("/^Normal$/",$pref))
                    $pref = test_input($_POST['pref']);
                } else {
                    $pref_error = 'Choose a valid preference';
                }
            }
        }

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tut17";

$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

if($firstname_error == '' && $lastname_error == '' && $email_error == '' && $regno_error == '' && $phnow_error == '' && $pref_error == '') {
    $stmt = $conn->prepare("INSERT INTO info (FN, LN, EMAIL, REGNO, PHNO, CT) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssids", $firstname, $lastname, $email, $regno, $phnow, $pref);
    $stmt->execute();
}
    echo "Succesfully registered";
$stmt -> close();
$conn -> close();

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
?>